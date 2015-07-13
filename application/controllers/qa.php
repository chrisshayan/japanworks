<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Qa extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('qa_model');
        $this->lang->load('message', $this->_lang);
        $this->load->helper('url');
    }

    public function index() {
        $page = $this->uri->segment(3);

        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 10) + 1;
        }
        $lists = $this->qa_model->listQuestions($page, $limit = 10);
        $listCate = $this->qa_model->listCategories();
        $listQuest = array();
        $totalQuestion = $this->qa_model->countAllQuestion();

        $i = 0;
        if ($lists) {
            foreach ($lists as $quest) {
                $listQuest[$i]['quest_id'] = $quest['id'];
                $listQuest[$i]['title'] = $quest['title'];
                $listQuest[$i]['cate_title'] = $quest['catitle'];
                $listQuest[$i]['description'] = $quest['description'];
                $listQuest[$i]['author'] = $quest['qauthor'];
                $listQuest[$i]['date'] = date_format(date_create($quest['createdate']), ' d-m-Y');
                $listQuest[$i]['comments'] = array();

                $totalComment = $this->qa_model->countAllComment($quest['id']);
                $totalQuestion = $this->qa_model->countAllQuestion();

                $listQuest[$i]['total_comment'] = $totalComment;

                if ($totalComment > 0) {
                    $comments = $this->qa_model->listComments($quest['id']);
                    if ($comments) {
                        $j = 0;
                        foreach ($comments as $cm) {
                            $listQuest[$i]['comments'][$j]['id'] = $cm['id'];
                            $listQuest[$i]['comments'][$j]['text'] = $cm['text'];
                            $listQuest[$i]['comments'][$j]['author'] = $cm['author'];
                            $listQuest[$i]['comments'][$j]['check'] = $cm['check'];
                            $listQuest[$i]['comments'][$j]['date'] = date_format(date_create($cm['createdate']), ' d-m-Y');
                            $j ++;
                        }
                    }
                    $i++;
                }
                $i++;
            }
        }

        //pagination
        $config = array();
        $url = base_url() . "qa/kw";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($totalQuestion) ? $totalQuestion : 0;
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Sau';
        $config['prev_link'] = 'Trước';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style = "display:none">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style = "display:none">';
        $config['last_tag_close'] = '</li>';

        if (( $config["per_page"] * $pageUrl) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageUrl - 1) * $config["per_page"] + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $pageUrl;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }


        $this->pagination->initialize($config);


        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);


        $this->ocular->set_view_data("listQuest", $listQuest);
        $this->ocular->set_view_data("listCate", $listCate);
        $this->ocular->set_view_data("totalQuestion", $totalQuestion);
        $this->ocular->render('blank');
    }

    public function postQuestion() {
        $title = $this->input->post('title');
        $author = $this->input->post('uname');
        $text = $this->input->post('text');
        $cateId = $this->input->post('cate');
        $cateName = $this->input->post('catename');
        $data = array(
            "cate_id" => $cateId,
            "text" => $text,
            "author" => $author,
            "title" => $title,
            'actflg' => 1,
            "createdate" => date("Y-m-d H:i:s"),
            "updatedate" => date("Y-m-d H:i:s")
        );

        $idQ = $this->qa_model->insertQuestion($data);
        echo "true";
        exit;


        echo "<div class='ask-ans clearfix' id='$idQ'>
                                        <div class='left-qa'>

                                            <div class='count-comt'>
                                                <span class='count-num'>0</span>
                                                <span class='comt'>Bình luận</span>
                                            </div>
                                        </div>
                                        <div class='right-qa'>
                                            <div class='title-question'>$title</div>
                                            <div class='title-topic'>$cateName</div>
                                            <div class='txt-comt expander'>$text</div>
                                            <div class='sub-qa'>
                                                <div class='sec-comt benefit'><a href=''><span class='ico_qa ico-comt'></span>Bình luận</a>
                                                </div>
                                                <div class='sec-share'><a href='#'><span class='ico_qa ico-share'></span>Share</a></div>
                                                <div class='sec-date'>Posted today</div>
                                            </div>
                                            <div class='comments'>
                                                <ul>
                                                    <li>
                                                        <span class='ava_user'><img src='" . base_url('static/img/defaultAva.png') . "' alt=''></span>
                                                        <div class='txt-comments'>
                                                            <input type='text' placeholder='Name' class='form-control c-author'>
                                                            <textarea class='form-control c-answer' rows='3'></textarea>
                                                            <button type='button' class='btn btn-orange btn_submit btn-sm'>Nhập</button>
                                                        </div>
                                                    </li>
                                                                                                    </ul>
                                            </div>
                                        </div>
                                    </div>";
    }

    public function insertComment() {
        $questId = $this->input->post('id');
        $author = $this->input->post('author');
        $comment = $this->input->post('comment');
        $cateid = $this->input->post('cate');

        $check = $this->input->post('check');
        $image = base_url('static/img/defaultAva.png');
        if ($check == 1) {
            $image = base_url('static/img/mrMorio.png');
        }
        $data = array(
            "quest_id" => $questId,
            "text" => $comment,
            "author" => $author,
            "check" => $check,
            'actflg' => 1,
            "createdate" => date("Y-m-d H:i:s"),
            "updatedate" => date("Y-m-d H:i:s")
        );

        $this->qa_model->insertComment($data);

        echo "<li>
                <span class='ava_user'><img src='" . $image . "' alt=''></span>
                <div class='txt-comments'>
                    <div class='name'>" . $author . "</div>
                    <div class='txt-comts'>
                        <p>" . $comment . "</p>
                        <div class='sub-qa'>
                           
                            <div class='sec-date'>" . date_format(date_create($data['createdate']), ' d-m-Y') . "</div>
                        </div>
                    </div>
                </div>
                </li>";
    }

}

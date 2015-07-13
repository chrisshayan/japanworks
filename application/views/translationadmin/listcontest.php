<div class="row wrapper white-bg page-heading">
    <div class="col-lg-8">
        <h2>Translation detail </h2>

    </div>
    <div class="col-lg-4">
        <div class="title-action">

            <a href="<?php echo base_url('translationadmin/insert'); ?>" class="small btn btn-primary" style="background-color: #1ab394;
               border-color: #1ab394;
               color: #FFFFFF;"><i class="fa fa-check "></i> Post </a>

        </div>
    </div>
</div>
<div class="row">
    <div class="ibox-title">
    </div>
    <div class="ibox-content">


        <table class="footable table table-stripped toggle-arrow-tiny default breakpoint footable-loaded" data-page-size="15">
            <thead>
                <tr>

                    <th data-toggle="true" class="footable-visible footable-first-column footable-sortable footable-sorted">Poster<span class="footable-sort-indicator"></span></th>
                    <th data-hide="phone" class="footable-visible footable-sortable">Text<span class="footable-sort-indicator"></span></th>
                    <th data-hide="all" class="footable-sortable">Level tag<span class="footable-sort-indicator"></span></th>
                    <th data-hide="phone" class="footable-visible footable-sortable">Prize<span class="footable-sort-indicator"></span></th>
                    <th data-hide="phone,tablet" class="footable-visible footable-sortable">Start date<span class="footable-sort-indicator"></span></th>
                    <th data-hide="phone" class="footable-visible footable-sortable">End date<span class="footable-sort-indicator"></span></th>

                    <th data-hide="phone" class="footable-visible footable-sortable">Status<span class="footable-sort-indicator"></span></th>
                    <th data-hide="phone" class="footable-visible footable-sortable">New<span class="footable-sort-indicator"></span></th>
                    <th class="text-right footable-visible footable-last-column" data-sort-ignore="true">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php if (isset($listContest)) { ?>
                    <?php foreach ($listContest as $list) {
                        ?>
                        <tr class="footable-even" >
                            <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                <?php echo $list['poster'] ?>
                            </td>
                            <td class="footable-visible">
                                <?php
				$order = array("&lt;br /&gt;", "&lt;br&gt;","<br />","<br>");
                                if (strlen(($list['text'])) > 37) {

                                          echo mb_substr(str_replace($order, "", ($list['text'])), 0, 37, 'UTF-8') . "...";
                                } else {

                                    echo $list['text'];
                                }
                                ?>


                            </td>

                            <td class="footable-visible">
                                <?php echo $list['level_tag'] ?>
                            </td>
                            <td class="footable-visible">
                                <?php echo $list['prize'] ?>
                            </td>
                            <td class="footable-visible">
                                <?php echo $list['start_date'] ?>
                            </td>
                            <td class="footable-visible">
                                <?php echo $list['end_date'] ?>
                            </td>
                            <td class="footable-visible">

                                <?php if ((strtotime(date("Y-m-d")) - strtotime($list['end_date'])) <= 0) { ?>
                                    <span class="label label-primary" style="background-color:#1ab394;color:#fff">Open</span>
                                <?php } else { ?>
                                    <span class="label label-danger" style="background-color:#ed5565;color:#fff">Close</span>
                                <?php } ?>
                            </td>
                            <td class="footable-visible">

                                <?php if ($list['new'] > 0) { ?>
                                    <span class="label label-warning" style="background-color:#f8ac59;color:#fff"><?php echo $list['new'] ?></span>

                                <?php } ?>
                            </td>
                            <td class="text-right footable-visible footable-last-column">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs"><a href="<?php echo base_url('translationadmin/detail/' . $list['id']) ?>" style="color:inherit">View</a></button>
                                    <button class="btn-white btn btn-xs"><a href="<?php echo base_url('translationadmin/edit/' . $list['id']) ?>"  style="color:inherit">Edit</a></button>
                                </div>
                            </td>
                        <?php } ?>
                    <?php } ?>
                </tr>
            </tbody>


        </table>
        <div class="pagination-block" align="center">
            <p>Show: <strong><?php echo $valueShowRecord; ?></strong> in <strong><?php echo isset($totalAllContest) ? $totalAllContest : 0; ?></strong> contest(s).</p>
            <ul class="pagination">
                <?php echo $this->pagination->create_links(); ?>
            </ul>
        </div>
    </div>



</div>

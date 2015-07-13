<!-- search -->
<div class="col-sm-9 left_side">
    <div class = "panel" id="content">
        <?php
        foreach ($quesTion->items as $quest) {


            echo $quest->body . "<br/>";

            if ($quest->is_answered == true) {
                foreach ($quest->answers as $ans) {
                    echo $ans->body;
                }
            }
        }
        ?>
    </div>
</div>

<!-- PAGE RIGHT SIDE -->
<div class="col-sm-3 right_side">

</div>



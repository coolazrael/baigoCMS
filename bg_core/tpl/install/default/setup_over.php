<?php $cfg = array(
    "sub_title"     => $this->lang["page"]["setupOver"],
    "mod_help"      => "setup",
    "act_help"      => "over",
    "pathInclude"   => BG_PATH_TPLSYS . "install/default/include/",
);

include($cfg["pathInclude"] . "setup_head.php"); ?>

    <form name="setup_form_over" id="setup_form_over">
        <input type="hidden" name="<?php echo $this->common["tokenRow"]["name_session"]; ?>" value="<?php echo $this->common["tokenRow"]["token"]; ?>">
        <input type="hidden" name="act" value="over">

        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok-sign"></span>
            <?php echo $this->lang["label"]["setupOver"]; ?>
        </div>

        <div class="bg-submit-box"></div>

        <div class="form-group clearfix">
            <div class="pull-left">
                <div class="btn-group">
                    <a href="<?php echo BG_URL_INSTALL; ?>index.php?mod=setup&act=admin" class="btn btn-default"><?php echo $this->lang["btn"]["stepPrev"]; ?></a>
                    <?php include($cfg["pathInclude"] . "setup_drop.php"); ?>
                </div>
            </div>

            <div class="pull-right">
                <button type="button" class="btn btn-primary bg-submit"><?php echo $this->lang["btn"]["over"]; ?></button>
            </div>
        </div>
    </form>


<?php include($cfg["pathInclude"] . "install_foot.php"); ?>

    <script type="text/javascript">
    var opts_submit_form = {
        ajax_url: "<?php echo BG_URL_INSTALL; ?>request.php?mod=setup",
        msg_text: {
            submitting: "<?php echo $this->lang["label"]["submitting"]; ?>"
        },
        jump: {
            url: "<?php echo BG_URL_CONSOLE; ?>index.php",
            text: "<?php echo $this->lang["href"]["jumping"]; ?>"
        }
    };

    $(document).ready(function(){
        var obj_submit_form = $("#setup_form_over").baigoSubmit(opts_submit_form);
        $(".bg-submit").click(function(){
            obj_submit_form.formSubmit();
        });
    });
    </script>

<?php include($cfg["pathInclude"] . "html_foot.php"); ?>
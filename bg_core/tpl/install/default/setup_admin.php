<?php $cfg = array(
    "sub_title"     => $this->lang["page"]["setupAdmin"],
    "mod_help"      => "setup",
    "act_help"      => "admin",
    "pathInclude"   => BG_PATH_TPLSYS . "install/default/include/",
);

include($cfg["pathInclude"] . "setup_head.php"); ?>

    <div class="alert alert-warning">
        <span class="glyphicon glyphicon-warning-sign"></span>
        <?php echo $this->lang["text"]["setupAdmin"]; ?>
    </div>

    <div class="form-group">
        <a href="<?php echo BG_URL_INSTALL; ?>index.php?mod=setup&act=auth" class="btn btn-info"><?php echo $this->lang["href"]["adminAuth"]; ?></a>
    </div>

    <form name="setup_form_admin" id="setup_form_admin" autocomplete="off">
        <input type="hidden" name="<?php echo $this->common["tokenRow"]["name_session"]; ?>" value="<?php echo $this->common["tokenRow"]["token"]; ?>">
        <input type="hidden" name="act" value="admin">
        <input type="hidden" name="admin_status" value="enable">
        <input type="hidden" name="admin_type" value="super">

        <div class="form-group">
            <div id="group_admin_name">
                <label class="control-label"><?php echo $this->lang["label"]["username"]; ?><span id="msg_admin_name">*</span></label>
                <input type="text" name="admin_name" id="admin_name" data-validate class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div id="group_admin_pass">
                <label class="control-label"><?php echo $this->lang["label"]["password"]; ?><span id="msg_admin_pass">*</span></label>
                <input type="password" name="admin_pass" id="admin_pass" data-validate class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div id="group_admin_pass_confirm">
                <label class="control-label"><?php echo $this->lang["label"]["passConfirm"]; ?><span id="msg_admin_pass_confirm">*</span></label>
                <input type="password" name="admin_pass_confirm" id="admin_pass_confirm" data-validate class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div id="group_admin_mail">
                <label class="control-label"><?php echo $this->lang["label"]["mail"]; ?><span id="msg_admin_mail"></span></label>
                <input type="text" name="admin_mail" id="admin_mail" data-validate class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div id="group_admin_nick">
                <label class="control-label"><?php echo $this->lang["label"]["nick"]; ?><span id="msg_admin_nick"></span></label>
                <input type="text" name="admin_nick" id="admin_nick" data-validate class="form-control">
            </div>
        </div>

        <div class="bg-submit-box"></div>

        <div class="form-group clearfix">
            <div class="pull-left">
                <div class="btn-group">
                    <a href="<?php echo BG_URL_INSTALL; ?>index.php?mod=setup&act=sso" class="btn btn-default"><?php echo $this->lang["btn"]["stepPrev"]; ?></a>
                    <?php include($cfg["pathInclude"] . "setup_drop.php"); ?>
                    <a href="<?php echo BG_URL_INSTALL; ?>index.php?mod=setup&act=over" class="btn btn-default"><?php echo $this->lang["btn"]["skip"]; ?></a>
                </div>
            </div>

            <div class="pull-right">
                <button type="button" class="btn btn-primary bg-submit"><?php echo $this->lang["btn"]["submit"]; ?></button>
            </div>
        </div>
    </form>

<?php include($cfg["pathInclude"] . "install_foot.php"); ?>

    <script type="text/javascript">
    var opts_validator_form = {
        admin_name: {
            len: { min: 1, max: 30 },
            validate: { type: "ajax", format: "strDigit", group: "#group_admin_name" },
            msg: { selector: "#msg_admin_name", too_short: "<?php echo $this->rcode["x010201"]; ?>", too_long: "<?php echo $this->rcode["x010202"]; ?>", format_err: "<?php echo $this->rcode["x010203"]; ?>", ajaxIng: "<?php echo $this->rcode["x030401"]; ?>", ajax_err: "<?php echo $this->rcode["x030402"]; ?>" },
            ajax: { url: "<?php echo BG_URL_INSTALL; ?>request.php?mod=setup&act=chkname", key: "admin_name", type: "str" }
        },
        admin_pass: {
            len: { min: 1, max: 0 },
            validate: { type: "str", format: "text", group: "#group_admin_pass" },
            msg: { selector: "#msg_admin_pass", too_short: "<?php echo $this->rcode["x010212"]; ?>" }
        },
        admin_pass_confirm: {
            len: { min: 1, max: 0 },
            validate: { type: "confirm", target: "#admin_pass", group: "#group_admin_pass_confirm" },
            msg: { selector: "#msg_admin_pass_confirm", too_short: "<?php echo $this->rcode["x010224"]; ?>", not_match: "<?php echo $this->rcode["x010225"]; ?>" }
        },
        admin_mail: {
            len: { min: 0, max: 300 },
            validate: { type: "str", format: "email", group: "#group_admin_mail" },
            msg: { selector: "#msg_admin_mail", too_long: "<?php echo $this->rcode["x010207"]; ?>", format_err: "<?php echo $this->rcode["x010208"]; ?>" }
        },
        admin_nick: {
            len: { min: 0, max: 30 },
            validate: { type: "str", format: "text", group: "#group_admin_nick" },
            msg: { selector: "#msg_admin_nick", too_long: "<?php echo $this->rcode["x020216"]; ?>" }
        }
    };
    var opts_submit_form = {
        ajax_url: "<?php echo BG_URL_INSTALL; ?>request.php?mod=setup",
        msg_text: {
            submitting: "<?php echo $this->lang["label"]["submitting"]; ?>"
        },
        jump: {
            url: "<?php echo BG_URL_INSTALL; ?>index.php?mod=setup&act=over",
            text: "<?php echo $this->lang["href"]["jumping"]; ?>"
        }
    };

    $(document).ready(function(){
        var obj_validator_form    = $("#setup_form_admin").baigoValidator(opts_validator_form);
        var obj_submit_form       = $("#setup_form_admin").baigoSubmit(opts_submit_form);
        $(".bg-submit").click(function(){
            if (obj_validator_form.verify()) {
                obj_submit_form.formSubmit();
            }
        });
    });
    </script>

<?php include($cfg["pathInclude"] . "html_foot.php"); ?>
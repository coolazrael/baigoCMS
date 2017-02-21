<?php $cfg = array(
    "title"          => $this->consoleMod["call"]["main"]["title"],
    "menu_active"    => "call",
    "sub_active"     => "list",
    "baigoCheckall"  => "true",
    "baigoValidator" => "true",
    "baigoSubmit"    => "true",
    "pathInclude"    => BG_PATH_TPLSYS . "console/default/include/",
    "str_url"        => BG_URL_CONSOLE . "index.php?mod=call&act=list&" . $this->tplData["query"],
);

include($cfg["pathInclude"] . "function.php");
include($cfg["pathInclude"] . "console_head.php"); ?>

    <div class="form-group clearfix">
        <div class="pull-left">
            <div class="form-group">
                <ul class="nav nav-pills bg-nav-pills">
                    <li>
                        <a href="<?php echo BG_URL_CONSOLE; ?>index.php?mod=call&act=form">
                            <span class="glyphicon glyphicon-plus"></span>
                            <?php echo $this->lang["href"]["add"]; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BG_URL_HELP; ?>index.php?mod=console&act=call" target="_blank">
                            <span class="glyphicon glyphicon-question-sign"></span>
                            <?php echo $this->lang["href"]["help"]; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pull-right">
            <form name="call_search" id="call_search" action="<?php echo BG_URL_CONSOLE; ?>index.php" method="get" class="form-inline">
                <input type="hidden" name="mod" value="call">
                <input type="hidden" name="act" value="list">
                <div class="form-group hidden-sm hidden-xs">
                    <select name="type" class="form-control input-sm">
                        <option value=""><?php echo $this->lang["option"]["allType"]; ?></option>
                        <?php foreach ($this->type["call"] as $key=>$value) { ?>
                            <option <?php if ($this->tplData["search"]["type"] == $key) { ?>selected<?php } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group hidden-sm hidden-xs">
                    <select name="status" class="form-control input-sm">
                        <option value=""><?php echo $this->lang["option"]["allStatus"]; ?></option>
                        <?php foreach ($this->status["call"] as $key=>$value) { ?>
                            <option <?php if ($this->tplData["search"]["status"] == $key) { ?>selected<?php } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm">
                        <input type="text" name="key" class="form-control" value="<?php echo $this->tplData["search"]["key"]; ?>" placeholder="<?php echo $this->lang["label"]["key"]; ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (BG_MODULE_GEN > 0 && BG_VISIT_TYPE == "static") { ?>
        <div class="form-group">
            <button data-url="<?php echo BG_URL_CONSOLE; ?>gen.php?mod=call&act=1by1" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#gen_modal">
                <span class="glyphicon glyphicon-refresh"></span>
                <?php echo $this->lang["btn"]["callGen1by1"]; ?>
            </button>
        </div>
    <?php } ?>

    <form name="call_list" id="call_list" class="form-inline">
        <input type="hidden" name="<?php echo $this->common["tokenRow"]["name_session"]; ?>" value="<?php echo $this->common["tokenRow"]["token"]; ?>">

        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-nowrap bg-td-xs">
                                <label for="chk_all" class="checkbox-inline">
                                    <input type="checkbox" name="chk_all" id="chk_all" data-parent="first">
                                    <?php echo $this->lang["label"]["all"]; ?>
                                </label>
                            </th>
                            <th class="text-nowrap bg-td-xs"><?php echo $this->lang["label"]["id"]; ?></th>
                            <th><?php echo $this->lang["label"]["callName"]; ?></th>
                            <th class="text-nowrap bg-td-sm"><?php echo $this->lang["label"]["status"]; ?> / <?php echo $this->lang["label"]["type"]; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->tplData["callRows"] as $key=>$value) { ?>
                            <tr>
                                <td class="text-nowrap bg-td-xs"><input type="checkbox" name="call_ids[]" value="<?php echo $value["call_id"]; ?>" id="call_id_<?php echo $value["call_id"]; ?>" data-parent="chk_all" data-validate="call_id"></td>
                                <td class="text-nowrap bg-td-xs"><?php echo $value["call_id"]; ?></td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li><?php echo $value["call_name"]; ?></li>
                                        <li>
                                            <ul class="bg-nav-line">
                                                <li>
                                                    <a href="<?php echo BG_URL_CONSOLE; ?>index.php?mod=call&act=show&call_id=<?php echo $value["call_id"]; ?>"><?php echo $this->lang["href"]["show"]; ?></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo BG_URL_CONSOLE; ?>index.php?mod=call&act=form&call_id=<?php echo $value["call_id"]; ?>"><?php echo $this->lang["href"]["edit"]; ?></a>
                                                </li>
                                                <?php if (BG_MODULE_GEN > 0 && BG_VISIT_TYPE == "static" && $value["call_status"] == "enable") { ?>
                                                    <li>
                                                        <a class="btn btn-xs btn-info" data-url="<?php echo BG_URL_CONSOLE; ?>gen.php?mod=call&act=single&call_id=<?php echo $value["call_id"]; ?>" data-toggle="modal" href="#gen_modal">
                                                            <span class="glyphicon glyphicon-refresh"></span>
                                                            <?php echo $this->lang["btn"]["callGenSingle"]; ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                                <td class="text-nowrap bg-td-sm">
                                    <ul class="list-unstyled">
                                        <li>
                                            <?php call_status_process($value["call_status"], $this->status["call"]); ?>
                                        </li>
                                        <li><?php echo $this->type["call"][$value["call_type"]]; ?></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><span id="msg_call_id"></span></td>
                            <td colspan="2">
                                <div class="bg-submit-box bg-submit-box-list"></div>
                                <div class="form-group">
                                    <div id="group_act">
                                        <select name="act" id="act" data-validate class="form-control input-sm">
                                            <option value=""><?php echo $this->lang["option"]["batch"]; ?></option>
                                            <?php foreach ($this->status["call"] as $key=>$value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                            <option value="del"><?php echo $this->lang["option"]["del"]; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-sm bg-submit"><?php echo $this->lang["btn"]["submit"]; ?></button>
                                </div>
                                <div class="form-group">
                                    <span id="msg_act"></span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </form>

    <div class="text-right">
        <?php include($cfg["pathInclude"] . "page.php"); ?>
    </div>

<?php include($cfg["pathInclude"] . "console_foot.php"); ?>

    <script type="text/javascript">
    var opts_validator_list = {
        call_id: {
            len: { min: 1, max: 0 },
            validate: { selector: "[data-validate='call_id']", type: "checkbox" },
            msg: { selector: "#msg_call_id", too_few: "<?php echo $this->rcode["x030202"]; ?>" }
        },
        act: {
            len: { min: 1, max: 0 },
            validate: { type: "select", group: "#group_act" },
            msg: { selector: "#msg_act", too_few: "<?php echo $this->rcode["x030203"]; ?>" }
        }
    };

    var opts_submit_list = {
        ajax_url: "<?php echo BG_URL_CONSOLE; ?>request.php?mod=call",
        confirm: {
            selector: "#act",
            val: "del",
            msg: "<?php echo $this->lang["confirm"]["del"]; ?>"
        },
        box: {
            selector: ".bg-submit-box-list"
        },
        msg_text: {
            submitting: "<?php echo $this->lang["label"]["submitting"]; ?>"
        }
    };

    $(document).ready(function(){
        var obj_validate_list = $("#call_list").baigoValidator(opts_validator_list);
        var obj_submit_list   = $("#call_list").baigoSubmit(opts_submit_list);
        $(".bg-submit").click(function(){
            if (obj_validate_list.verify()) {
                obj_submit_list.formSubmit();
            }
        });
        $("#call_list").baigoCheckall();
    });
    </script>

<?php include($cfg["pathInclude"] . "html_foot.php"); ?>
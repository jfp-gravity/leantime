<?php
defined('RESTRICTED') or die('Restricted access');
$roles = $this->get('roles');
$values = $this->get('values');
$user = $this->get('user');
?>


<div class="pageheader">

    <div class="pageicon"><span class="fa fa-user"></span></div>
    <div class="pagetitle">
        <h5><?php echo $this->__('label.overview') ?></h5>
        <h1><h1><?php echo $this->__('headlines.my_profile'); ?></h1></h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $this->displayNotification(); ?>

        <div class="row-fluid">
            <div class="span7">

                <div class="widget">
                    <h4 class="widgettitle"><?php echo $this->__('label.overview'); ?></h4>
                    <div class="widgetcontent">

                        <form action="" method="post" class='stdform'>
                            <input type="hidden" name="<?=$_SESSION['formTokenName']?>" value="<?=$_SESSION['formTokenValue']?>" />
                            <p>
                                <label for="firstname"><?php echo $this->__('label.firstname'); ?></label>
                                <span class='field'>
                                    <input type="text" class="input" name="firstname" id="firstname" <?=$_SESSION['userdata']['isLdap'] ? "disabled='disabled'" : ''; ?>
                                           value="<?php $this->e($values['firstname']) ?>"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="lastname"><?php echo $this->__('label.lastname'); ?></label>
                                <span class='field'>
                                    <input type="text" name="lastname" class="input" id="lastname" <?=$_SESSION['userdata']['isLdap'] ? "disabled='disabled'" : ''; ?>
                                           value="<?php $this->e($values['lastname']) ?>"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="user"><?php echo $this->__('label.email'); ?></label>
                                <span class='field'>
                                    <input type="text" name="user" class="input" id="user" <?=$_SESSION['userdata']['isLdap'] ? "disabled='disabled'" : ''; ?>
                                           value="<?php $this->e($values['user']) ?>"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="phone"><?php echo $this->__('label.phone'); ?></label>
                                <span class='field'>
                                    <input type="text" name="phone" class="input" id="phone" <?php if ($values['notifications'] == "1") echo " checked='checked' "; ?>
                                           value="<?php $this->e($values['phone']) ?>"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="currentPassword"><?php echo $this->__('label.old_password') ?></label>
                                <span class='field'>
                                    <input type='password' value="" name="currentPassword" class="input" <?=$_SESSION['userdata']['isLdap'] ? "disabled='disabled'" : ''; ?>
                                           id="currentPassword"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="oldPassword"><?php echo $this->__('label.new_password') ?></label>
                                <span class='field'>
                                    <input type='password' value="" name="newPassword" class="input" <?=$_SESSION['userdata']['isLdap'] ? "disabled='disabled'" : ''; ?>
                                           id="newPassword"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="newPassword"><?php echo $this->__('label.password_repeat') ?></label>
                                <span class='field'>
                                    <input type="password" value="" name="confirmPassword" class="input" <?=$_SESSION['userdata']['isLdap'] ? "disabled='disabled'" : ''; ?>
                                           id="confirmPassword"/><br/>
                                </span>
                            </p>

                            <p>
                                <label for="notifications"><?php echo $this->__('label.receive_notifications') ?></label>
                                <span class='field'>
                                    <input type="checkbox" value="" name="notifications" class="input"
                                           id="notifications" <?php if ($values['notifications'] == "1") echo " checked='checked' "; ?>/> <br/>
                                </span>
                            </p>

                            <p>
                                <label for="messagesfrequency"><?php echo $this->__('label.messages_frequency') ?></label>
                                <span class='field'>
                                    <select name="messagesfrequency" class="input" id="messagesfrequency" >
                                        <option value="">--<?php echo $this->__('label.choose_option') ?>--</option>
                                        <option value="300" <?php if ($values['messagesfrequency'] == "300") echo " selected "; ?>>5min</option>
                                        <option value="900" <?php if ($values['messagesfrequency'] == "900") echo " selected "; ?>>15min</option>
                                        <option value="1800" <?php if ($values['messagesfrequency'] == "1800") echo " selected "; ?>>30min</option>
                                        <option value="3600" <?php if ($values['messagesfrequency'] == "3600") echo " selected "; ?>>1h</option>
                                        <option value="10800" <?php if ($values['messagesfrequency'] == "10800") echo " selected "; ?>>3h</option>
                                        <option value="36000" <?php if ($values['messagesfrequency'] == "36000") echo " selected "; ?>>6h</option>
                                        <option value="43200" <?php if ($values['messagesfrequency'] == "43200") echo " selected "; ?>>12h</option>
                                        <option value="86400" <?php if ($values['messagesfrequency'] == "86400") echo " selected "; ?>>24h</option>
                                        <option value="172800" <?php if ($values['messagesfrequency'] == "172800") echo " selected "; ?>>48h</option>
                                        <option value="604800" <?php if ($values['messagesfrequency'] == "604800") echo " selected "; ?>>1w</option>
                                    </select> <br/>
                                </span>
                            </p>

                            <p class='stdformbutton'>
                                <input type="submit" name="save" id="save"
                                       value="<?php echo $this->__('buttons.save'); ?>" class="button"/>
                            </p>

                        </form>

                    </div>
                </div>
            </div>
            <div class="span5">
                <div class='widgetbox'>
                    <h4 class='widgettitle'><?php echo $this->__('headlines.profile_picture'); ?></h4>

                    <div class='widgetcontent' style="text-align:center;">

                        <img src='<?php echo $this->get('profilePic') ?>'  class='profileImg' alt='Profile Picture' id="previousImage"/>
                        <div id="profileImg">
                        </div>

                        <div class="par">

                            <label><?php echo $this->__('label.upload') ?></label>

                            <div class='fileupload fileupload-new' data-provides='fileupload'>
                                <input type="hidden"/>
                                <div class="input-append">
                                    <div class="uneditable-input span3">
                                        <i class="iconfa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-file">
                                        <span class="fileupload-new"><?php echo $this->__('buttons.select_file') ?></span>
                                        <span class='fileupload-exists'><?php echo $this->__('buttons.change') ?></span>
                                        <input type='file' name='file' onchange="leantime.usersController.readURL(this)"/>
                                    </span>

                                    <a href='#' class='btn fileupload-exists' data-dismiss='fileupload' onclick="leantime.usersController.clearCroppie()"><?php echo $this->__('buttons.remove') ?></a>
                                </div>
                                <p class='stdformbutton'>
                                    <span id="save-picture" class="btn btn-primary fileupload-exists ld-ext-right">
                                        <span onclick="leantime.usersController.saveCroppie()"><?php echo $this->__('buttons.save') ?></span>
                                        <span class="ld ld-ring ld-spin"></span>
                                    </span>
                                    <input id="picSubmit" type="submit" name="savePic" class="hidden"
                                           value="<?php echo $this->__('buttons.upload'); ?>"/>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="span5">
                <div class='widgetbox'>
                    <h4 class='widgettitle'><?php echo $this->__('headlines.twoFA'); ?></h4>
                    <div class='widgetcontent'>
                        <?php if ($values['twoFAEnabled']) { ?>
                            <p><?php echo $this->__('text.twoFA_enabled'); ?></p>
                        <?php } else { ?>
                            <p><?php echo $this->__('text.twoFA_disabled'); ?></p>
                        <?php } ?>
                        <p><a href="<?=BASE_URL ?>/twoFA/edit"><?php echo $this->__('text.twoFA_manage'); ?></a></p>
                    </div>
                </div>
            </div>
        </div>






<?php
/**
 * This view displays the tabs for the question creation
 */
?>
<?php PrepareEditorScript(true, $this); ?>
<?php $eqrow  = array_map('htmlspecialchars', $eqrow); ?>
<?php if($eqrow['title']) {$sPattern="^([a-zA-Z][a-zA-Z0-9]*|{$eqrow['title']})$";}else{$sPattern="^[a-zA-Z][a-zA-Z0-9]*$";} ?>

<!-- New question language tabs -->
<ul class="nav nav-tabs" style="margin-right: 8px;" >
    <li role="presentation" class="active">
        <a data-toggle="tab" href="#<?php echo $eqrow['language']; ?>">
            <?php echo getLanguageNameFromCode($eqrow['language'],false); ?>
            (<?php eT("Base language"); ?>)
        </a>
    </li>
    <?php foreach  ($addlanguages as $addlanguage):?>
        <li role="presentation">
            <a data-toggle="tab" href="#<?php echo $addlanguage; ?>">
                <?php echo getLanguageNameFromCode($addlanguage,false); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Editors for each languages -->
<div class="tab-content">

    <!-- Base Language tab-pane -->
    <div id="<?php echo $eqrow['language']; ?>" class="tab-pane fade in active">

        <!-- Question Code -->
        <div class="form-group col-sm-12" style="padding-left: 0px;">
            <label class="col-sm-1 control-label"  for='title' style="padding-left: 0px;">
                <?php eT("Code:"); ?>
            </label>
            <div class="col-sm-4" style="padding-left: 0px;">
                <input type='text' autofocus="autofocus" size='20' maxlength='20' id='title' required='required' name='title' pattern='<?php echo $sPattern ?>' value="<?php echo $eqrow['title']; ?>" />
            </div>
            <div class="col-sm-1" style="padding-left: 0px;">
                <span class='text-warning'><?php  eT("Required"); ?> </span>
            </div>
        </div>

        <!-- Question Text -->
        <div class="form-group">
            <label for='question_<?php echo $eqrow['language']; ?>' class=""> <?php eT("Question:"); ?></label>
            <div class='htmleditor' >
                <textarea cols='80' rows='100' id='question_<?php echo $eqrow['language']; ?>' name='question_<?php echo $eqrow['language']; ?>'><?php echo $eqrow['question']; ?></textarea>                
            </div>
            <?php echo getEditor("question-text","question_".$eqrow['language'], "[".gT("Question:", "js")."](".$eqrow['language'].")",$surveyid,$gid,$qid,$action); ?>                  
        </div>
        
        <!-- Question Help -->
        <div class="form-group">
            <label for='help_<?php echo $eqrow['language']; ?>' class=""><?php eT("Help:"); ?></label>
            
            <div class='htmleditor' >
                <textarea cols='45' rows='4' id='help_<?php echo $eqrow['language']; ?>' name='help_<?php echo $eqrow['language']; ?>'><?php echo $eqrow['help']; ?></textarea>                
            </div>
            <?php echo getEditor("question-help","help_".$eqrow['language'], "[".gT("Help:", "js")."](".$eqrow['language'].")",$surveyid,$gid,$qid,$action); ?>                  
        </div>
    </div>
    
    <!-- Other languages tab-panes -->
    <?php foreach  ($addlanguages as $addlanguage): ?>
        <div id="<?php echo $addlanguage; ?>"  class="tab-pane fade">
            

            <!-- Question Text -->
            <div class="form-group">
                <label for='question_<?php echo $addlanguage; ?>'><?php eT("Question:"); ?></label>
                <div class='htmleditor' >
                    <textarea cols='80' rows='4' id='question_<?php echo $addlanguage; ?>' name='question_<?php echo $addlanguage; ?>'></textarea>                
                </div>
                <?php echo getEditor("question-text","question_".$addlanguage, "[".gT("Question:", "js")."](".$addlanguage.")",$surveyid,$gid,$qid,$action); ?>                  
            </div>

            <!-- Question Help -->
            <div class="form-group">
                <label for='help_<?php echo $addlanguage; ?>'><?php eT("Help:"); ?></label>
                <div class='htmleditor'>
                    <textarea cols='45' rows='4' id='help_<?php echo $addlanguage; ?>' name='help_<?php echo $addlanguage; ?>'></textarea>
                    <?php echo getEditor("question-help","help_".$addlanguage, "[".gT("Help:", "js")."](".$addlanguage.")",$surveyid,$gid,$qid,$action); ?>                
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- submit buttons-->
<div id='questionactioncopy' class='extra-action'>
    <button type='submit' class="saveandreturn hidden" name="redirection" value="edit"><?php eT("Save") ?> </button>
    <input type='submit' class="hidden" value='<?php eT("Save and close"); ?>' />
</div>
<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: editor.php
*/
require __DIR__ . '/kernel/sys.php';
if (isset($_GET['dir'])) {
  if ($_GET['dir'] == "/" or $_GET['dir'] == null) {
      $main_path = ROOT_DIR . "/";
  } else {
      $main_path = ROOT_DIR . "/" . $_GET['dir'];
  }
  $dirb = urldecode($_GET['dir']);
  if ($dirb == "/") {
      $dirb = "";
  }
} else {
  $main_path = ROOT_DIR . "/";
  $dirb = null;
}
if(substr_count($dirb, "//") > 0) {
  $dirb = str_replace("//", "", $dirb);
}
function loadFileDir($file, $ROOT, $dirb)
{
    if($ROOT == true) {
        $rd = ROOT_DIR . "/";
    } else {
        $rd = null;
    }
    if (isset($dirb)) {
        if ($dirb !== "/" or $dirb !== null) {
            if($file == null) {
                $ra = urldecode($dirb);
            } else {
                $ra = urldecode($dirb . "/");
            }
        }
    } else {
        $ra = null;
    }
    $res = $rd . $ra . urldecode($file);
    return $res;
}
$load_file = fopen($main_path, "r");
?>
<div class="dir-badge mdl-card mdl-shadow--2dp">
    <?php
    if (isset($dirb) && $dirb !== "/") {
        if ($dirb !== null && $dirb !== "") { ?>
            <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/dir.php<?php
                                                                                                                        $___fetch_dir = explode("/", urldecode($dirb));
                                                                                                                        array_pop($___fetch_dir);
                                                                                                                            if($___fetch_dir != null) {
                                                                                                                                echo "?dir=";
                                                                                                                            }
                                                                                                                            foreach ($___fetch_dir as $BACK_DIR) {
                                                                                                                                if(count($___fetch_dir) > 1) {
                                                                                                                                    echo "/" . $BACK_DIR;
                                                                                                                                } else {
                                                                                                                                    echo $BACK_DIR;
                                                                                                                                }
                                                                                                                            }
                                                                                                                        ?>" style="float: left;">
                <span class="material-icons">
                    arrow_back_ios
                </span>
                <div class="rippleJS"></div>
            </button>
    <?php }
    } ?>
    <a class="inndeexx link-click" data-href="core/system/dir.php" href="#"><i class="material-icons">home</i> (root)<?php if ($dirb !== "") {
                                                                                                                            echo "/";
                                                                                                                        } ?></a>
    <?php
    if (isset($dirb) && $dirb !== "/") {
        if ($dirb !== "/" or $dirb !== null) {
            $fetch__dir = explode("/", $dirb);
            foreach ($fetch__dir as $dir_badge) { ?>
                <a><?php echo $dir_badge . "/"; ?></a>
    <?php }
        }
    } ?>
</div>
<div class="open-ace">
  <textarea id="raw-input"><?php
                            if (filesize($main_path) > 0) {
                              echo fread($load_file, filesize($main_path));
                            } ?></textarea>
  <div id="editor"></div>

</div>
<div class="open-editor-nav">
  <button class="f-sv mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
    <span class="material-icons">
      save
    </span>
    Save <div class="rippleJS"></div>
  </button>
  <button class="fs-ed mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
    <span class="material-icons">
      fullscreen
    </span>
    Full <div class="rippleJS"></div>
  </button>
  <button class="f5 mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
    <span class="material-icons">
      refresh
    </span>
    Reload <div class="rippleJS"></div>
  </button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="js/page.js"></script>

<script>
  $('.f5').click(function() {
    if (confirm("Bạn có muốn reload lại không? -- LƯU Ý: nhớ lưu lại file không tạch sml :v\nDo you want to reload file? -- note: remember save your file :3")) {
      cload("core/system/editor.php?dir=<?php echo $dirb;?>");
    }
  })
  $('.fs-ed').click(function() {
    if ($('.open-editor-nav').css("position") === "fixed") {
      $('.open-editor-nav').removeClass("open-editor-nav__full");
      $('#editor').removeClass("editor--full");
    } else {
      $('.open-editor-nav').addClass("open-editor-nav__full");
      $('#editor').addClass("editor--full");
    }
  })
  $('.f-sv').click(function() {
    var content = ace.edit("editor").getValue();
    $.ajax({
      method: "POST",
      url: "core/system/kernel/sys.php",
      cache: false,
      data: {
        save__in_file: "<?php echo $main_path; ?>",
        save__content: content
      },
      beforeSend: function() {
        $('.saving--icon').css("display", "block");
      },
      success: function() {
        $('.saving--icon').css("display", "none");
      }
    })
  })

  function load_ace() {
    var editor = ace.edit("editor");
    var textarea = $('#raw-input').hide();
    editor.getSession().setValue(textarea.val());
    editor.getSession().on('change', function() {
      textarea.val(editor.getSession().getValue());
    });
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/<?php
                                      $ext_file = pathinfo($main_path, PATHINFO_EXTENSION);
                                      if ($ext_file == "js") {
                                        echo "javascript";
                                      } else {
                                        echo $ext_file;
                                      } ?>");
  }
  load_ace();
</script>
<?php fclose($load_file); ?>
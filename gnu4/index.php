<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "환영합니다!";
include_once("./_head.php");
?>

<div id="contents">
  <div id="index-header">
    <?php echo latest("basic", 'notice', 5, 40); ?>
    <?php echo front_banner("front", 40); ?>
  </div>
  <div id="node">
    <br style="clear: both;" />
    <?php echo latest("basic", 'inquiry', 5, 100); ?>
    <?php echo latest("basic", 'press', 5, 100); ?>
    <?php echo latest("basic", 'talk', 5, 100); ?>
    <br style="clear: both;" />
  </div>
</div>

<?
include_once("./_tail.php");
?>

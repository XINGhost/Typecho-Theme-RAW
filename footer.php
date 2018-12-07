<?php
/**
 * footer.php
 * 
 * 尾部
 * 
 * @author 熊猫小A
 * 
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<script>
    var serviceWorkerUri = '/SWCacheRule.js';

    if ('serviceWorker' in navigator) {  
        navigator.serviceWorker.register(serviceWorkerUri).then(function() {
          if (navigator.serviceWorker.controller) {
            console.log('Assets cached by the controlling service worker.');
          } else {
            console.log('Please reload this page to allow the service worker to handle network operations.');
          }
        }).catch(function(error) {
          console.log('ERROR: ' + error);
        });
    } else {
        console.log('Service workers are not supported in the current browser.');
    }
</script>
<?php $this->footer(); ?>
<script src="<?php $this->options->themeUrl('/assets/owo/owo_custom.js'); ?>"></script>
<?php if($this->allow('comment')&&($this->is('post')||$this->is('page')) ): ?>
<script>
var owo = new OwO({
    logo: 'OωO表情',
    container: document.getElementsByClassName('OwO')[0],
    target: document.getElementsByClassName('input-area')[0],
    api: '<?php $this->options->themeUrl('/assets/owo/OwO_2.json'); ?>',
    position: 'down',
    width: '400px',
    maxHeight: '250px'
});
</script>
<?php endif; ?>  
<script src="<?php $this->options->themeUrl('/assets/hljs/highlight.pack.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/assets/fancybox/jquery.fancybox.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/assets/main.24.js'); ?>"></script>
<!--script src="<?php $this->options->themeUrl('/assets/smothscroll/smothscroll.js'); ?>"></script-->
<?php if($this->options->pjax=='1'): ?>
<script src="<?php $this->options->themeUrl('/assets/pjax/jquery.pjax.js'); ?>"></script>
<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/pjax/np.css');?>">
<script src="<?php $this->options->themeUrl('/assets/pjax/np.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/assets/RAW.09.js'); ?>"></script>
<script>
$(document).on('pjax:complete', function() {
  <?php echo $this->options->pjaxreload; ?>
})
</script>
<?php endif; ?>
<?php echo $this->options->customfooter; ?>
<script src='<?php $this->options->themeUrl('/assets/mathjax/2.7.4/MathJax.js'); ?>' async></script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });
</script>
<?php if(Utils::isPluginAvailable('Like')):?>
<script>
var cookies = $.macaroon('_syan_like') || "";
$.each($(".post-like"),function(i,item){
    var id = $(item).attr('data-pid');
    if (-1 !== cookies.indexOf("," + id + ","))  $(item).addClass("done");
})
</script>
<?php endif;?>
<?php if(!Utils::isMobile()): ?>
<script src="<?php $this->options->themeUrl('/assets/panda/panda0a.js'); ?>"></script>
<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/panda/waifu.06.css');?>">
<div class="waifu">
    <div class="waifu-tips"></div>
    <div>
        <canvas id="live2d" width="650" height="600" class="live2d" style="width: 325px;height: 300px;"></canvas>
    </div>
    <div class="waifu-tool">
        <span class="l2d-home"><a href="/" style="border:none"><i class="fa fa-home"></i></a></span>
        <span class="l2d-eye"><i class="fa fa-moon-o"></i></span>
        <span class="l2d-chat"><i class="fa fa-comment"></i></span>
        <!--<span class="fui-user"></span>-->
        <span class="l2d-photo"><i class="fa fa-camera-retro"></i></span>
        <span class="l2d-info-circle"><a href="/about" style="border:none"><i class="fa fa-info-circle"></i></a></span>
        <span class="l2d-cross"><i class="fa fa-close"></i></span>
    </div>
  </div>
<script async src="<?php $this->options->themeUrl('/assets/panda/waifu-tips.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/assets/panda/live2d.js'); ?>"></script>
<script type="text/javascript">
    loadlive2d("live2d", "<?php $this->options->themeUrl('/assets/panda/kesshouban/model.json'); ?>");
    checkWaifu();
</script>
<style>
#TOC{
  max-height: calc(100vh - 420px);
}
</style>
<?php endif; ?>
</body>
</html>

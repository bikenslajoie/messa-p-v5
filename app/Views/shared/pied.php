</div>
</div><!-- /.main-content -->


<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                Messa <strong class="version">5.0</strong> &copy; <a href="https://doralya.com" target="_blank">Doralya</a> 2013-<?php echo date("Y") ?>
            </span>
        </div>
    </div>
</div>

<a href="javascript:void(0)" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->


<!-- <![endif]-->

<script>
    $(document).ready(function() {
        $(".various").fancybox({
            maxWidth: 1024,
            maxHeight: 700,
            fitToView: false,
            width: '70%',
            height: '70%',
            modal: true,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            showCloseButton: true,
            afterShow: function() {
                $('.fancybox-skin').append('<a title="Close" class="fancybox-item fancybox-close" href="javascript:jQuery.fancybox.close();"></a>');
            },
            afterClose: function() {

            }
        });
        $(".variousRefresh").fancybox({
            maxWidth: '100%',
            maxHeight: '100%',
            fitToView: false,
            width: '100%',
            height: '100%',
            modal: true,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            showCloseButton: true,
            afterShow: function() {
                $('.fancybox-skin').append('<a title="Close" class="fancybox-item fancybox-close" href="javascript:jQuery.fancybox.close();"></a>');
            },
            beforeClose: function() {

            },
            afterClose: function() {
                window.location.replace('<?php echo current_url() ?>')
            }
        });
        $(".variousF").fancybox({
            maxWidth: '100%',
            maxHeight: '100%',
            fitToView: false,
            width: '100%',
            height: '100%',
            modal: true,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            showCloseButton: true,
            afterShow: function() {
                $('.fancybox-skin').append('<a title="Close" class="fancybox-item fancybox-close" href="javascript:jQuery.fancybox.close();"></a>');
            },
            afterClose: function() {

            }
        });

        $(".variousPetit").fancybox({
            maxWidth: 800,
            maxHeight: 500,
            fitToView: false,
            width: '100%',
            height: '100%',
            modal: true,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            showCloseButton: true,
            afterShow: function() {
                $('.fancybox-skin').append('<a title="Close" class="fancybox-item fancybox-close" href="javascript:jQuery.fancybox.close();"></a>');
            },
            afterClose: function() {
                window.location.replace('<?php echo current_url() ?>')
            }
        });

        $(".variousPetit_2").fancybox({
            maxWidth: 800,
            maxHeight: 500,
            fitToView: false,
            width: '100%',
            height: '100%',
            modal: true,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            showCloseButton: true,
            afterShow: function() {
                $('.fancybox-skin').append('<a title="Close" class="fancybox-item fancybox-close" href="javascript:jQuery.fancybox.close();"></a>');
            },
            afterClose: function() {

            }
        });



    });
</script>
<script>
    setInterval(status, 3000);
    var link2 = document.getElementById('img_no');
    link2.style.visibility = 'hidden';
    link2.style.display = 'none';

    var timelimit = 3000;

    function status() {

        var link1 = document.getElementById('img_yes');
        var link2 = document.getElementById('img_no');

        if (navigator.onLine) {
            link1.style.visibility = 'visible';
            link1.style.display = 'inline';
            link2.style.visibility = 'hidden';
            link2.style.display = 'none';
        } else {
            link2.style.visibility = 'visible';
            link2.style.display = 'inline';
            link1.style.visibility = 'hidden';
            link1.style.display = 'none';
        }
    }
</script>
<div id="dialog-message" class="hide">
    <p id="title-message"></p>
</div>

<input type="hidden" id="annee_actuelle_ajax" value="<?php if (isset($anneeactives->periode)) echo dec($anneeactives->periode); ?>" />

</body>

</html>
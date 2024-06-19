 <div class="left-settings">

        <div class="inner center">

            <script>
                document.write('<img class="img_night ' + imge_time + '" src="<?php echo theme_url ?>/dashboard/assets/images/night.jpg" style="max-width: 133px;">')
            </script>
            <script>
                document.write('<img class="img_morning ' + imge_time + '" src="<?php echo theme_url ?>/dashboard/assets/images/morning.svg" style="max-width: 133px;">')
            </script>



            <h4>الساعة الان : <?php echo '<script>document.write("<b>" + hours + ":" + minutes + " " + "</b>");</script>' ?></h4>
            <h3>
                <script>
                    document.write("" + time_status + "");
                </script>
            </h3>
            <h2>نتمنى لك يوماً سعيداً</h2>
            <?php

            ?>
        </div>
    </div>
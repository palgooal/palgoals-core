<?php
function my_custom_shortcode() {
    $per_page = 5;
                    $args = array(

                        'order' => array(
                            'by' => 'created_at_gmt',
                            'order' => 'DESC'
                        )
                    );

                    $submissions =   tahqq_get_submissions($args);

                    if ($submissions ) {
                        foreach ($submissions['data'] as $key => $value) {
                            $id = $value['id'];
                            $page = $value["referer"];
                            $form = $value['form']["name"];
                            $main = $value["main"]['value'];
                            $date = $value["created_at_gmt"];
                            $post = $value['post']['id'];



                            $gmt_date = new DateTime($date, new DateTimeZone('GMT'));
                            $timezone = new DateTimeZone('Asia/Riyadh');
                            $gmt_date->setTimezone($timezone);
                            $local_date_string = $gmt_date->format('Y-m-d H:i:s');

                            ?>
                            <li>
                                <a target="_blank" href="?pages=entry&parent=members&entry_id=<?= $id ?>">
                                    <h3>طلب جديد!</h3>

                                    <h4>
                                        <p>لقد تم تعبئة طلب جديد من <span><?= $main ?></span></p>

                                        <i class="treeview-indicator fa fa-angle-left"></i>
                                    </h4>
                                </a>
                                <hr>
                            </li>
                    <?php }
                    } else {

                        echo '<p>لا توجد إشعارات مهمة بعد !</p>';
                    }
}
add_shortcode('myshortcode', 'my_custom_shortcode');
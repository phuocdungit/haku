<?php
add_action('wp_enqueue_scripts', 'sage_parent_theme_styles');

function sage_parent_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style', get_stylesheet_directory_uri() . '/jquery-ui.css');

add_action('wp_enqueue_scripts', 'wp_enqueue_custom_scripts');

function wp_enqueue_custom_scripts() {
    wp_enqueue_script('child-custom-js', get_stylesheet_directory_uri() . '/custom.js', array('jquery'));
}

date_default_timezone_set('Asia/Ho_Chi_Minh');

function datban() {
    ?> 
    <div class="reservation_bg">
        <div class="container">
            <div class="res_"><img src="/wp-content/uploads/2015/04/reservation.png" height="64" width="163"> </div>
            <div class="request"> <span class="request_notify"></span>
                <form id="formBook" class="formBook" name="formBook" method="POST" enctype="multipart/form-data">
                    <div class="aspNetHidden">
                        <input type="hidden" name="action" value="formBook">
                        <input type="hidden" class="type" name="type" value="save">
                        <input type="hidden" class="id" name="id" value="0">
                    </div>
                    <div class="order_slide2" style="opacity:0">
                        <div class="customer_name">
                            <p> Tên khách hàng </p>
                            <input placeholder="Tên Khách Hàng" class="name" name="name" type="text">
                        </div>
                        <div class="phone_number">
                            <p> Số điện thoại</p>
                            <input placeholder="Số điện thoại" class="phone" name="phone" type="text">
                        </div>
                        <div class="phone_number">
                            <p> Email</p>
                            <input placeholder="Email" class="email" name="email" type="text">
                        </div>                       
                        <a class="check button button_request btn btn-form" href="javascript:;" onclick="jQuery('#formBook').submit();">Đặt bàn</a>                       
                    </div>
                    <div class="order_slide1">
                        <div class="restaurant">
                            <p> Nhà hàng </p>
                            <select id="restaurant_pick" name="restaurant">
                                <?php
                                $postArgs = array(
                                    'numberposts' => -1,
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'post_type' => 'nha-hang',
                                    'suppress_filters' => 0,
                                );
                                $AllPost = get_posts($postArgs);
                                foreach ($AllPost as $key => $value) {
                                    echo '<option value="' . $value->post_title . '">' . $value->post_title . '</option>';
                                }
                                ?>                                                           
                            </select>
                        </div>
                        <div class="calendar">
                            <p> Thời gian </p>              
                            <input id="date" class="date-picker" name="date" value="<?php echo date('d-m-Y') ?>" type="text">              

                            <script type="text/javascript">

                                jQuery(document).ready(function () {
                                    jQuery('#date').datepicker({
                                        dateFormat: 'dd-mm-yy'
                                    });
                                });

                            </script>
                        </div>
                        <div class="time">
                            <p> Giờ </p>
                            <select name="time" id="time_order"><option value="10 : 00">10 : 00</option><option value="10 : 30">10 : 30</option><option value="11 : 00">11 : 00</option><option value="11 : 30">11 : 30</option><option value="12 : 00">12 : 00</option><option value="12 : 30">12 : 30</option><option value="13 : 00">13 : 00</option><option value="13 : 30">13 : 30</option><option value="14 : 00">14 : 00</option><option value="14 : 30">14 : 30</option><option value="15 : 00">15 : 00</option><option value="15 : 30">15 : 30</option><option value="16 : 00">16 : 00</option><option value="16 : 30">16 : 30</option><option value="17 : 00">17 : 00</option><option value="17 : 30">17 : 30</option><option value="18 : 00">18 : 00</option><option value="18 : 30">18 : 30</option><option value="19 : 00">19 : 00</option><option value="19 : 30">19 : 30</option><option value="20 : 00">20 : 00</option><option value="20 : 30">20 : 30</option><option value="21 : 00">21 : 00</option><option value="21 : 30">21 : 30</option><option value="22 : 00">22 : 00</option><option value="22 : 30">22 : 30</option></select>
                        </div>
                        <div class="mumberparty">
                            <p> Số người </p>
                            <select name="numberparty">
                                <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option>                <option value="15+">15+</option>
                            </select>
                        </div>
                        <a class="button button_request btn btn-form" href="javascript:;">Đặt bàn</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}

add_shortcode('datban', 'datban');

add_action('wp_ajax_formBook', 'formBook');
add_action("wp_ajax_nopriv_formBook", "formBook");

function formBook() {
    $info = '<p><strong>Tên khách hàng: </strong>' . $_POST['name'] . '</p>
        <p><strong>Số điện thoại: </strong>' . $_POST['phone'] . '</p>
        <p><strong>Email: </strong>' . $_POST['email'] . '</p>
        <p><strong>Nhà hàng: </strong>' . $_POST['restaurant'] . '</p>
        <p><strong>Thời gian: </strong>' . $_POST['date'] . '</p>
        <p><strong>Giờ: </strong>' . $_POST['time'] . '</p>
         <p><strong>Số người: </strong>' . $_POST['numberparty'] . '</p>';
    $post_id = wp_insert_post(array(
        'post_author' => 'admin',
        'post_title' => $_POST['name'],
        'post_content' => $info,
        'post_type' => 'dat-ban',
        'post_status' => 'publish',
    ));

    sendMail($info);
    echo json_encode(array(
        'msg' => 'Đặt bàn thành công. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất để xác nhận yêu cầu của bạn!',
        'err' => 0,
    ));
    exit;
}

function sendMail($data) {
//theme admin
    $emailAdmin = get_option('admin_email');
    $subjectAdmin = 'Thông báo đặt bàn';
    $headersAdmin[] = 'From: Fujiya <info@fujiya.com.vn> "\r\n"';
    $messageAdmin = apply_filters('the_content', $data);
    add_filter('wp_mail_content_type', function ($content_type) {
        return 'text/html';
    });
    wp_mail($emailAdmin, $subjectAdmin, $messageAdmin, $headersAdmin);
    remove_filter('wp_mail_content_type', 'set_html_content_type');

    function set_html_content_type() {
        return 'text/html';
    }

}

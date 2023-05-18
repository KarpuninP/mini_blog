<?php

class Ph_Widget_Info_Links extends WP_Widget {
// перерегестрируем конструктор
    public function __construct() {
        // Вызываем конструктор родительского класса
        parent::__construct(
            'ph_widget_info_link',
            __('External Link Widget', 'text_domain'),
            [
                'name' => 'External Link Widget - виджет перехода',
                'description' => __( 'Переход на другой сайт', 'text_domain' ),
            ]
        );
    }

//    то что выводин на фронтент сторону
    public function widget( $args, $instance ) {
        // Получаем данные из параметров виджета
        $external_link = isset( $instance['external_link'] ) ? $instance['external_link'] : '';
        $link_text = isset( $instance['link_text'] ) ? $instance['link_text'] : '';

        // Если ссылка на внешний сайт задана
        if ( ! empty( $external_link ) ) {
            // Генерируем HTML-код ссылки
            $html = '<a href="' . esc_url( $external_link ) . '">' . esc_html( $link_text ) . '</a>';
            // Выводим сгенерированный HTML-код на экран
            echo $html;
        }
    }

//    форма, которая выводится в админ
    public function form( $instance ) {
        // Получаем данные из параметров виджета
        $external_link = isset( $instance['external_link'] ) ? $instance['external_link'] : '';
        $link_text = isset( $instance['link_text'] ) ? $instance['link_text'] : '';

        // Генерируем HTML-код формы редактирования виджета
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'external_link' ); ?>"><?php esc_attr_e( 'Ссылка на внешний сайт:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'external_link' ); ?>" name="<?php echo $this->get_field_name( 'external_link' ); ?>" type="text" value="<?php echo esc_attr( $external_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php esc_attr_e( 'Текст ссылки:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>">
        </p>
        <?php
    }

//    когда обновляешь данные
    public function update( $new_instance, $old_instance ) {
        // Санитизация и сохранение данных из формы редактирования виджета
        $instance = [];
        $instance['external_link'] = isset( $new_instance['external_link'] ) ? sanitize_text_field( $new_instance['external_link'] ) : '';
        $instance['link_text'] = isset( $new_instance['link_text'] ) ? sanitize_text_field( $new_instance['link_text'] ) : '';
        return $instance;
    }
}

<?php
    add_action('rest_api_init', 'practiceAreaRouteRegister');

    function practiceAreaRouteRegister() {
      register_rest_route('acv/v1','/practiceArea', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'practiceAreaResult',
        'permission_callback' => '__return_true'
      ));
    }

    function practiceAreaResult(){
        $mainQuery = new WP_Query(array(
            'post_type' => array('page'),
            'page_id' => 13
          ));
          $results = array( );
          while($mainQuery->have_posts()){
            $mainQuery->the_post();
             $practiceAreaList = carbon_get_the_post_meta('angelok_content_practice_areas');
             foreach($practiceAreaList as $item){
                array_push($results,array(
                    'name' => $item['angelok_content_practice_area_name'],
                    'description' =>  $item['angelok_content_practice_area_description']
                ));
             };

        }
        
        return $results;
    }
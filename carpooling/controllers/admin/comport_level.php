<?php

class Comport_level extends Admin_Controller {

    var $comport_id = false;
    var $user = '';

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->user = $this->CI->admin_session->userdata('admin');
        $this->load->model(array('comport_level_model'));
        $this->load->helper('formatting_helper');
        $this->load->helper('form');
        $this->lang->load('backend');
        
        $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];
    }

    function index() {
        //we're going to use flash data and redirect() after form submissions to stop people from refreshing and duplicating submissions
        //$this->session->set_flashdata('message', 'this is our message');
        $this->load->library('Pagination_admin');
        $data['page_title'] = ('Comport level');

        $config['is_ajax_paging'] = true;
        $config['paging_function'] = 'comport_ajax';
        $config['base_url'] = base_url('admin/vehicle');
        $data['count_result'] = $this->comport_level_model->count_comport();
        $config['total_rows'] = $data['count_result'];
        $config['per_page'] = '10';
        $config['uri_segment'] = 4;

        $this->pagination_admin->initialize($config);

        $data['pagination'] = $this->pagination_admin->create_links();
        $data['comport_level'] = $this->comport_level_model->get_comport_levels($this->pagination_admin->per_page, $this->uri->segment(4));
        //echo '<pre>';print_r($data['vehicle']); die;
        $this->load->view($this->config->item('admin_folder') . '/comport_level', $data);
    }

    function comport_ajax() {
        $this->load->library('Pagination_admin');
        $config['is_ajax_paging'] = true;
        $config['paging_function'] = 'comport_ajax';
        $config['base_url'] = base_url('admin/vehicle');
        $data['count_result'] = $this->comport_level_model->count_comport();
        $config['total_rows'] = $data['count_result'];
        $config['per_page'] = '10';
        $config['uri_segment'] = 4;

        $this->pagination_admin->initialize($config);

        $data['pagination'] = $this->pagination_admin->create_links();
        $data['comport_level'] = $this->comport_level_model->get_comport_levels($this->pagination_admin->per_page, $this->uri->segment(4));
        $this->load->view($this->config->item('admin_folder') . '/comport_level_list', $data);
    }

    function form($id = false) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['page_title'] = ('Vehicle Form');

        //default values are empty if the provider is new
        $data['comport_id'] = '';
        $data['comport_level'] = ''; 
        $data['uploadvalues'] = '';
        $data['is_active'] = '';        

        if ($id) {
            $this->comport_id = $id;            
            $comport = $this->comport_level_model->getcomport($id);             
            //if the vehicle does not exist, redirect them to the vehicle list with an error
            if (!$comport) {
                $this->session->set_flashdata('error', 'Comport level is not fount.');
                redirect($this->config->item('admin_folder') . '/comport_level');
            }
            

            //set values to db values
            $data['comport_id'] = $comport->comport_id;
            $data['comport_level'] = $comport->comport_level;    
            $data['uploadvalues'] = $comport->comport_logo;
            $data['is_active'] = $comport->is_active;
            
        }

        $this->form_validation->set_rules('comport_level', 'Comport level', 'trim|required');
        $this->form_validation->set_rules('uploadvalues', 'Comport level Image', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view($this->config->item('admin_folder') . '/comport_level_form', $data);
        } else {

            $param['comport_id'] = $id;
            $param['comport_level'] = $this->input->post('comport_level');
            $param['comport_logo'] = $this->input->post('uploadvalues', true);
            $param['is_active'] = $this->input->post('is_active');           
            
            $this->comport_level_model->save($param);
            $this->session->set_flashdata('message', ('The Comport level has been saved!'));

            //go back to the vehicle list
            redirect($this->config->item('admin_folder') . '/comport_level');
        }
    }
    
    function comport_image_upload() {


        $imagetype = $this->input->post('imageType');

        $filename = $_FILES['comportimg']['name'];
        $size = $_FILES['comportimg']['size'];

        //get the extension of the file in a lower case format
        $ext = $this->getExtension($filename);
        $ext = strtolower($ext);
        $actual_image_name = 'user' . $this->user['id'] . '_comport_' . time() . "." . $ext;
        if (!$imagetype) {

            //config image upload  
            $config['allowed_types'] = $this->config->item('acceptable_files');
            $config['upload_path'] = $this->config->item('comport_upload_dir') . 'full';
            $config['file_name'] = $actual_image_name;
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('comportimg')) {
                $upload_data = $this->upload->data();

                $this->load->library('image_lib');
                //this is the larger image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->config->item('comport_upload_dir') . 'full/' . $upload_data['file_name'];
                $config['new_image'] = $this->config->item('comport_upload_dir') . 'medium/' . $upload_data['file_name'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 600;
                $config['height'] = 500;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                //small image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->config->item('comport_upload_dir') . 'medium/' . $upload_data['file_name'];
                $config['new_image'] = $this->config->item('comport_upload_dir') . 'small/' . $upload_data['file_name'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 235;
                $config['height'] = 235;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                //cropped thumbnail
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->config->item('comport_upload_dir') . 'small/' . $upload_data['file_name'];
                $config['new_image'] = $this->config->item('comport_upload_dir') . 'thumbnails/' . $upload_data['file_name'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                $config['height'] = 150;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                if ($upload_data) {

                    $style = '<div id="gallery-photos-wrapper" class="vehiclesimage">
							<ul id="gallery-photos" class="clearfix gallery-photos gallery-photos-hover ui-sortable">
								<li id="recordsArray_1" class="col-md-2 col-sm-3 col-xs-6" style="width:45%">								
									<div class="photo-box" style="background-image: url(' . theme_comport_img($upload_data['file_name']) . ');"></div>
									<a href="javascript:void(0);" class="remove-photo-link" id="comport-img-remove">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
										</span>
									</a>
								</li>
							</ul>							
							<img src="' . theme_comport_img($upload_data['file_name']) . '" style="display:none;">
                                                        <input type="hidden" name="uploadvalues" value="' . $upload_data['file_name'] . '" />
						</div>';

                    echo $style;
                }
            }

            if ($this->upload->display_errors() != '') {
                echo $this->upload->display_errors();
            }
        }
    }
    
    
    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }

        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    function delete_image() {
        $img_name = $this->input->post('img_name');       
        $status = $this->comport_level_model->delete_image($img_name);
        if ($img_name) {
            $file = $this->config->item('comport_upload_dir') . 'full/' . $img_name;
            //delete the existing file if needed
            if (file_exists($file)) {
                unlink($file);
                $file_1 = $this->config->item('comport_upload_dir') . 'medium/' . $img_name;
                $file_2 = $this->config->item('comport_upload_dir') . 'small/' . $img_name;
                $file_3 = $this->config->item('comport_upload_dir') . 'thumbnails/' . $img_name;
                if (file_exists($file_1)) {
                    unlink($file_1);
                }
                if (file_exists($file_2)) {
                    unlink($file_2);
                }
                if (file_exists($file_3)) {
                    unlink($file_3);
                }
                echo true;
            }
            echo false;
        } else {
            echo false;
        }
    }

    function get_image() {
        $category_id = $this->input->post('cid');
        $image = $this->vechicle_model->get_image($category_id);
        die(json_encode(array('result' => true, 'image' => $image)));
    }

    function delete($id = false) {
        
        $comport = $this->comport_level_model->check_comportlevel($id);
        
        if (!$comport) {
            $this->session->set_flashdata('error', 'Comport level is not found.');
            redirect($this->config->item('admin_folder') . '/comport_level');
        } else {
            $delete = $this->comport_level_model->delete($id);
            $this->session->set_flashdata('message', ('The comport level has been deleted'));
            redirect($this->config->item('admin_folder') . '/comport_level');            
        }
    }

    

    function check_vehicle($str) {
        $name = $this->Vehicles_model->check_vehicle($str, $this->vehicle_id);

        if ($name) {
            $this->form_validation->set_message('check_vehicle', 'The vehicle name already in use');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function change_status() {
        
        $this->auth->is_logged_in();

        $comport_id = $this->input->post('mid');
        $status = $this->input->post('status');
       
        if (!empty($comport_id) && !empty($status)) {
            $comport = (array) $this->comport_level_model->getcomport($comport_id);
            
            if (!$comport) {               
                echo false;
            } else {
                if ($status == 'enable') {
                    $comport['is_active'] = '1';
                } elseif ($status == 'disable') {
                    $comport['is_active'] = '0';
                }

                $id = $this->comport_level_model->save($comport);
                echo $id;
            }
        }

        echo false;
    }

}

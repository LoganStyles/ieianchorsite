<!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> {{date("Y")}} &copy; IEI Anchor Pensions

        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->

<!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <!--<script src="{{asset('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>-->        
        <script src="{{asset('/assets/global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/pages/scripts/form-validation.min.js')}}" type="text/javascript"></script>        
        
        <!--<script src="{{asset('/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{asset('/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>-->
        
        <!--<script src="{{asset('/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>-->
        
        <!--<script src="{{asset('/assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>-->
        
        <script src="{{asset('/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/js_handler.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <script type="text/javascript">
            $(document).ready(function(){
                //fetch specific content & display in form
                $('body').on('click','.clicked_button',function(){
                    var $this =$(this);
                    var type=$this.parents('.bordered').children('.portlet-body').find('#type').val();
                    console.log('type '+type);
                    //hidden fields vars
                    var title_field="#"+type+"_title";
                    var id_field="#"+type+"_id";
                    var type_field="#type";
                    var position_field="#"+type+"_position";
                    var display_field="#"+type+"_display";
                    var details_field="#"+type+"_details";
                    
                    //form fields vars
                    var form_id="#"+type+"_form #id";
                    console.log('form_id '+form_id);
                    var form_title="#"+type+"_form #title";
                    console.log('form_title '+form_title);
                    var form_type="#"+type+"_form #type";
                    console.log('form_type '+form_type);
                    var form_position="#"+type+"_form #position";
                    console.log('form_position '+form_position);
                    var form_details="#"+type+"_form #details";
                    console.log('form_details '+form_details);
                    var form_display_yes="#"+type+"_form #display_yes";
                    console.log('form_display_yes '+form_display_yes);
                    var form_display_no="#"+type+"_form #display_no";
                    console.log('form_display_no '+form_display_no);
                    var form_display="#"+type+"_form #display";
                    console.log('form_display '+form_display);
                    //get values from hidden fields
                    var title_val=$this.parents('.bordered').children('.portlet-title').find(title_field).text();
                    var id_val=$this.parents('.bordered').children('.portlet-body').find(id_field).val();
                    var type_val=$this.parents('.bordered').children('.portlet-body').find(type_field).val();
                    var position_val=$this.parents('.bordered').children('.portlet-body').find(position_field).val();
                    var display_val= $this.parents('.bordered').children('.portlet-body').find(display_field).val();
                    var details_val =$this.parents('.bordered').children('.portlet-body').find(details_field).text();
                    
                    console.log('pos '+position_val);
                    console.log('display '+display_val);
                    console.log('title_val '+title_val);
                    console.log('details_val '+details_val);
                    console.log('type_val '+type_val);
                    //assign values got from hidden fields to form fields
                    $(form_id).val(id_val);
                    $(form_type).val(type_val);
                    $(form_title).val(title_val);
                    $(form_position).val(position_val);
                    
                    if(display_val==1){
                        console.log('display is 1 ');
                        $(form_display_yes).prop('checked', true);
                    }else{
                        $(form_display_no).prop('checked', true);
                        console.log('display is 0 ');
                    }
                    $(form_display).text(display_val);
                    $(form_details).text(details_val).focus();
                });
                
                $('body').on('click','.del_button',function(){
                    var $this = $(this);
                    var type_val=$this.parents('.bordered').children('.portlet-body').find('#type').val();
                    console.log('type_val '+type_val);
                    var delete_id='#'+type_val+'_id';
                    var delete_form_id='#'+type_val+'_delete_form #id';
                    var delete_modal='#'+type_val+'_delete_modal';
                    console.log('delete_id '+delete_id);
                    console.log('delete_form_id '+delete_form_id);
                    console.log('delete_modal '+delete_modal);
                    console.log('id to delete '+id_val);
                    var id_val=$this.parents('.bordered').children('.portlet-body').find(delete_id).val();
                    console.log('id to delete '+id_val);
                    $(delete_form_id).val(id_val);
                    $(delete_modal).modal({backdrop:false,keyboard:false});
                });
                
                $('body').on('click', '.table_row', function () {
                    //select or deselect a row
                    console.log('a radio was clicked');
                    var $this = $(this);
                    $('.table_row').removeClass('active');
                    $this.addClass('active');
                    
                    var row_id=$this.find('.row_id').val();
                    var row_type=$this.find('.row_type').val();
                    if(row_type==="role"){
                        var row_users=$this.find('.row_users').val();
                        var row_delete_group=$this.find('.row_delete_group').val();
                        var row_title=$this.find('.row_title').text();
                        var row_description=$this.find('.row_description').text();
                        console.log('row_id '+row_id);
                        console.log('row_title '+row_title);
                        console.log('row_description '+row_description);

                        var formid="#"+row_type+"_form";
                        var field_id=formid+" #id";
                        $(field_id).val(row_id);

                        var field_title=formid+" #title";
                        $(field_title).val(row_title);

                        var field_description=formid+" #description";
                        $(field_description).val(row_description);

                        var field_users=formid+" #users";
                        $(field_users).val(row_users);

                        var field_delete=formid+" #delete_group";
                        $(field_delete).val(row_delete_group);
                    }
                    
                });
                
            });
        
        </script>
        

</body>

</html>
<div class="modal fade" id="edit_patient_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('Edit Vendor')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST" id="edit_patient_form">
            @csrf
            <div class="text-danger" id="edit_patient_modal_error"></div>
            <div class="modal-body" id="edit_patient_inputs">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fa fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="{{__('Vendor Name')}}" name="name"
                        id="edit_name" required>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-globe"></i>
                          </span>
                        </div>
                        <select class="form-control" name="country_id" id="edit_country_id">
                          <option value="" disabled selected>{{__('Select nationality')}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fa fa-id-card"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="{{__('National ID')}}" name="national_id"
                        id="edit_national_id">
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fa fa-passport"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="{{__('Passport no')}}" name="passport_no"
                        id="edit_passport_no">
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </div>
                      <input type="email" class="form-control" placeholder="{{__('Email Address')}}" name="email"
                        id="edit_email">
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-phone-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="{{__('Phone number')}}" name="phone"
                        id="edit_phone">
                    </div>
                  </div>
    
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-map-marker-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="{{__('Address')}}" name="address"
                          id="edit_address">
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-mars"></i>
                          </span>
                        </div>
                        <select class="form-control" name="gender" placeholder="{{__('Gender')}}" id="edit_gender"
                          required>
                          <option value="" disabled selected>{{__('Select Gender')}}</option>
                          <option value="male">{{__('Male')}}</option>
                          <option value="female">{{__('Female')}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
    
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-baby"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control datepicker" placeholder="{{__('Date of birth')}}" name="dob"
                          id="edit_dob" required>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 pr-0">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-baby"></i>
                          </span>
                        </div>
                        <input type="number" class="form-control" name="age" id="edit_age" placeholder="{{__('Age')}}"
                          required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 pl-0">
                      <div class="input-group mb-3">
                        <select class="form-control" name="age_unit" id="edit_age_unit" required>
                          <option value="" disabled selected>{{__('Select age unit')}}</option>
                          <option value="years">{{__('Years')}}</option>
                          <option value="months">{{__('Months')}}</option>
                          <option value="days">{{__('Days')}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
    
                </div>
    
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="fas fa-file-contract"></i>
                        </span>
                      </div>
                      <select name="contract_id" id="edit_patient_contract_id" class="form-control">
                        <option value="" selected disabled>{{__('Select contract')}}</option>
                      </select>
                    </div>
                  </div>
                </div>
    
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="edit_avatar">
                        <input type="hidden" id="edit_patient_avatar_hidden" name="avatar">
                        <label class="custom-file-label">{{__('Choose avatar')}}</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
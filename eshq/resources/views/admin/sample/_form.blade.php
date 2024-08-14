<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="sample_category">{{__('Sample Category')}}</label>
             <select name="sample_category" class="form-control" id="sample_category" required>
            <option value="">{{__('Select Category')}}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="prepared_by">{{__('Prepared By')}}</label>
            <input type="text" class="form-control" name="prepared_by" required>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="approved_by">{{__('Approved By')}}</label>
            <input type="text" class="form-control" name="approved_by">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="received_package_condition">{{__('Received Package Condition')}}</label>
            <select name="received_package_condition" class="form-control" required>
                <option value="satisfactory">{{__('Satisfactory')}}</option>
                <option value="unsatisfactory">{{__('Unsatisfactory')}}</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="type_of_sampling">{{__('Type of Sampling')}}</label>
            <select name="type_of_sampling" class="form-control" required>
                <option value="routine">{{__('Routine')}}</option>
                <option value="non_routine">{{__('Non-Routine')}}</option>
                <option value="investigation">{{__('Investigation')}}</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="date_and_time_of_sample_received">{{__('Date and Time of Sample Received')}}</label>
            <input type="datetime-local" class="form-control" name="date_and_time_of_sample_received" required>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="temperature_observed_when_received">{{__('Temperature Observed When Received')}}</label>
            <input type="number" class="form-control" name="temperature_observed_when_received" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="verified_by">{{__('Verified By')}}</label>
            <input type="text" class="form-control" name="verified_by" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{__('Sample Details')}}</h3>
                <ul class="list-style-none">
                    <li class="d-inline float-right">
                        <button type="button" class="btn btn-primary btn-sm add_sample_detail">
                            <i class="fa fa-plus"></i>
                            {{__('Sample Detail')}}
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-striped table-bordered sample_details">
                            <thead>
                                <tr>
                                    <th>{{__('Sample Identification No')}}</th>
                                    <th>{{__('Date of Collection')}}</th>
                                    <th>{{__('Time of Collection')}}</th>
                                    <th>{{__('Temperature Upon Collection')}}</th>
                                    <th>{{__('Sample Type/Outlet')}}</th>
                                    <th>{{__('Location Details')}}</th>
                                    <th>{{__('Sender Initials')}}</th>
                                    <th>{{__('Additional Information')}}</th>
                                    <th width="10px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="" id="count_sample_details" value="0">

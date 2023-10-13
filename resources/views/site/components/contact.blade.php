<div class="container-fluid row p-5">
    <div class="col-md-6 text-center">
        <img src="{{ asset('/media/codes-1697112570.gif')}}" alt="" class="rounded">
    </div>
    <div class="col-md-6">
        <h3>Get brochure for free</h3>
        <form class="" action="">
            <div class="form-row row">
                <div class="col-md-6 my-2">
                  <input type="text" class="form-control" placeholder="First name" name="first_name">
                </div>
                <div class="col-md-6 my-2">
                  <input type="text" class="form-control" placeholder="Last name" name="last_name">
                </div>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                </div>
                <div class="col-md-6 my-2">
                    <select class="form-control" placeholder="Select service" name="service">
                        <option>Certification</option>
                        <option value="BIS Registration - Foreign Manufacturer">BIS Registration - Foreign Manufacturer</option>
                        <option value="BIS Registration - Indian Manufacturer">BIS Registration - Indian Manufacturer</option>
                        <option value="WPC Approval - Foreign Manufacturer">WPC Approval - Foreign Manufacturer</option>
                        <option value="WPC Approval - Indian Manufacturer">WPC Approval - Indian Manufacturer</option>
                        <option value="ISI Certification - Foreign Manufacturer">ISI Certification - Foreign Manufacturer</option>
                        <option value="ISI Certification - Indian Manufacturer">ISI Certification - Indian Manufacturer</option>
                        <option value="BEE Registration - Foreign Manufacturer">BEE Registration - Foreign Manufacturer</option>
                        <option value="BEE Registration - Indian Manufacturer">BEE Registration - Indian Manufacturer</option>
                        <option value="TEC Certification - Foreign Manufacturer">TEC Certification - Foreign Manufacturer</option>
                        <option value="TEC Certification - Indian Manufacturer">TEC Certification - Indian Manufacturer</option>
                        <option value="EPR Authorization - E-waste Approval">EPR Authorization - E-waste Approval</option>
                        <option value="EPR Authorization - P-waste Approval">EPR Authorization - P-waste Approval</option>
                        <option value="EPR - Battery Waste Management">EPR - Battery Waste Management</option>
                        <option value="Trademark">Trademark</option>
                        <option value="Copyright">Copyright</option>
                        <option value="Patent">Patent</option>
                    </select>
                </div>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control" placeholder="Country" name="country">
                </div>
                <div class="col-md-6 my-2">
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control" placeholder="Captcha" name="captcha">
                </div>
                <div class="col-md-12 my-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

 <!--MODAL FORM FOR MEMBERSHIP REGISTRATION-->
<div class="modal fade" id="membershipModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-image: url('images/greenmodal.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">          
          <!--Grid Column-->
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 text-success font-weight-light" id="myModalLabel"><strong>Become a </strong><span
              class="green-text font-weight-bold"><strong>BestGig </strong></span><strong>Member</strong></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
          <!-- Select button -->
        <div class="md-form mb-2 mx-auto">
        <label class="form-label">Membership type</label>
        <select class="form-select btn btn-outline-success btn-rounded btn-sm" id="membertype" name="membertype" aria-label="Default select example">
          <option selected>Choose your member type</option>
          <option value="free">Free</option>
          <option value="basic">Basic</option>
          <option value="standard">Standard</option>
          <option value="premium">Premium</option>
        </select>
        </div>
        <!-- Select LGA/LCDA button -->
        
          <div class="md-form">
            <input type="text" id="memberfee" class="form-control validate text-success" name="memberfee" readonly="">
            <label data-error="wrong" data-success="right">Fee</label>
          </div>
          <div class="form-group">
            <input class="form-check-input" type="checkbox" id="checkbox624">
            <label for="checkbox624" class="text-success form-check-label justify-content-center">I hereby authorize you to debit my BestGig account for this payment</label>
          </div>
          <div class="md-form mb-5">
            <label class="form-label">Subscription duration</label>
        <select class="form-select btn btn-outline-success btn-rounded btn-sm" name="memberduration" aria-label="Default select example">
          <option selected>Select the duration you are paying for</option>
          <option value="1">1 month</option>
          <option value="2">3 months</option>
          <option value="3">6 months</option>
          <option value="4">12 months</option>
        </select>
          </div>
          </div>

          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">

            <!--Grid column-->
            <div class="text-center mt-2 mb-3 col-md-12">
              <button type="button" class="btn btn-success btn-block btn-rounded z-depth-1">Submit</button>
            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            
            <!--Grid column-->

          </div>
          <!--Grid row-->

        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal For Signup -->

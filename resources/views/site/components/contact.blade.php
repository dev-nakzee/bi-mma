<div class="container-fluid row p-5">
    <div class="col-md-6 text-center">
        <img src="{{ asset('/media/codes-1697112570.gif')}}" alt="" class="rounded">
    </div>
    <div class="col-md-6">
        <h3>Get brochure for free</h3>
        <form>
            <div class="form-row row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Last name">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Mobile">
                </div>
                <div class="col-md-6">
                    <select class="form-control" placeholder="Select service"></select>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Country">
                </div>
                <div class="col-md-6">
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="captcha">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
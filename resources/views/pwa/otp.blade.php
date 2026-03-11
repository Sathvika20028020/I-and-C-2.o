@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')
<style>
    .font-aneka {
        font-family: 'Anek Latin', sans-serif;
    }
    .fontsize {
        font-size: 18px;
        font-weight: 600;
        color: black;
    }
    .fontsize1 {
        font-size: 16px;
        font-weight: 500;
        color: rgba(0, 0, 0, 0.521);
    }
    .footer .footer-title {
        font-size: 23px;
    }
    .otp-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        background-color: #fff;
    }
    .otp-input {
        width: 40px;
        height: 40px;
        text-align: center;
        font-size: 20px;
        margin: 0 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .otp-input:focus {
        border-color: #007bff;
        outline: none;
    }
    .verify-btn {
        margin-top: 15px;
        padding: 10px 30px;
        border-radius: 5px;
    }
    .otp-label {
        font-weight: 600;
        margin-bottom: 10px;
    }
    .resend {
        font-size: 0.9rem;
        color: #666;
        margin-top: 10px;
    }
    .icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<div class="page-title page-title-small">
    <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>OTP</h2>
    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
        data-src="images/avatars/5s.png"></a>
</div>
<div class="card header-card shape-rounded" data-card-height="90">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
</div>

<div class="d-flex flex-column gap-2  mt-5 mb-3">
    <div class="vector-card">
        <div class="content mb-2">
            <div>
                <form class="needs-validation" method="POST" action="{{route('pwa.verify.otp')}}" novalidate>
                    @csrf
                    <div class="otp-card" style="box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
                        <div class="icon">📱</div>
                        <h5 class="font-aneka">OTP Verification</h5>
                        <p class="font-aneka">OTP has been sent via SMS to <strong>9901901075</strong></p>
                        <div class="d-flex justify-content-center">
                            <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                            <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                            <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                            <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                            <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                            <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                        </div>
                        <button class="btn btn-primary verify-btn font-aneka" type="submit">Verify OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const inputs = document.querySelectorAll(".otp-input");

        inputs.forEach((input, index) => {
            input.addEventListener("input", function () {
                if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener("keydown", function (e) {
                if (e.key === "Backspace" && this.value === "" && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    });
</script>
@endsection

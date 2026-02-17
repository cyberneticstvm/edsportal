@extends("base")
@section("content")
<div class="page-modules">
    <div class="container">
        <h6>Main Modules</h6>
        <ul class="list-unstyled d-flex justify-content-sm-start justify-content-between flex-wrap p-0 gap-xl-4 gap-md-3 gap-2 mt-3 li_animate">
            <!-- Icon: Dashboard-->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('index') }}" aria-label="Overview of your analytics &amp; activities.">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M25 32.5C25 33.8261 25.5268 35.0979 26.4645 36.0355C27.4021 36.9732 28.6739 37.5 30 37.5C31.3261 37.5 32.5979 36.9732 33.5355 36.0355C34.4732 35.0979 35 33.8261 35 32.5C35 31.1739 34.4732 29.9021 33.5355 28.9645C32.5979 28.0268 31.3261 27.5 30 27.5C28.6739 27.5 27.4021 28.0268 26.4645 28.9645C25.5268 29.9021 25 31.1739 25 32.5Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M33.625 28.875L38.75 23.75" style="stroke-dasharray: 7.24784; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M16 50C12.3454 47.0952 9.68478 43.1256 8.38695 38.6412C7.08911 34.1568 7.2183 29.3797 8.75661 24.972C10.2949 20.5643 13.1662 16.7443 16.9725 14.0413C20.7788 11.3382 25.3316 9.88611 30 9.88611C34.6684 9.88611 39.2212 11.3382 43.0275 14.0413C46.8338 16.7443 49.7051 20.5643 51.2434 24.972C52.7817 29.3797 52.9109 34.1568 51.6131 38.6412C50.3152 43.1256 47.6546 47.0952 44 50H16Z" style="stroke-dasharray: 139.151; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                        <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 7V21L12 17L6 21V7C6 5.93913 6.42143 4.92172 7.17157 4.17157C7.92172 3.42143 8.93913 3 10 3H14C15.0609 3 16.0783 3.42143 16.8284 4.17157C17.5786 4.92172 18 5.93913 18 7Z" style="stroke-dasharray: 58.9886; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            </svg>
                        </div>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Dashboard</h5>
                </a>
            </li>
            <!-- Icon: AI Tools-->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('change.password') }}" aria-label="Smart tools to boost productivity.">
                    <div class="module-box rounded-4">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M41 22L41 43" style="stroke-dasharray: 21; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M37 43L27.5 18L18 43" style="stroke-dasharray: 53.4883; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M34 37H20" style="stroke-dasharray: 14; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M33.9344 10L13.5556 10C12.3474 10 11.1886 10.471 10.3343 11.3094C9.47996 12.1479 9 13.285 9 14.4707L9 46.5293C9 47.715 9.47996 48.8521 10.3343 49.6905C11.1886 50.529 12.3473 51 13.5556 51L45.4444 51C46.6527 51 47.8114 50.529 48.6657 49.6906C49.52 48.8521 50 47.715 50 46.5293L50 24.639" style="stroke-dasharray: 127.485; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M51.4706 17.25C51.9386 17.25 52.3875 17.4344 52.7184 17.7626C53.0494 18.0908 53.2353 18.5359 53.2353 19C53.2353 18.5359 53.4212 18.0908 53.7522 17.7626C54.0831 17.4344 54.532 17.25 55 17.25C54.532 17.25 54.0831 17.0656 53.7522 16.7374C53.4212 16.4092 53.2353 15.9641 53.2353 15.5C53.2353 15.9641 53.0494 16.4092 52.7184 16.7374C52.3875 17.0656 51.9386 17.25 51.4706 17.25ZM51.4706 6.75C51.9386 6.75 52.3875 6.93437 52.7184 7.26256C53.0494 7.59075 53.2353 8.03587 53.2353 8.5C53.2353 8.03587 53.4212 7.59075 53.7522 7.26256C54.0831 6.93437 54.532 6.75 55 6.75C54.532 6.75 54.0831 6.56563 53.7522 6.23744C53.4212 5.90925 53.2353 5.46413 53.2353 5C53.2353 5.46413 53.0494 5.90925 52.7184 6.23744C52.3875 6.56563 51.9386 6.75 51.4706 6.75ZM45.2941 17.25C45.2941 15.8576 45.8519 14.5223 46.8447 13.5377C47.8376 12.5531 49.1841 12 50.5882 12C49.1841 12 47.8376 11.4469 46.8447 10.4623C45.8519 9.47774 45.2941 8.14239 45.2941 6.75C45.2941 8.14239 44.7363 9.47774 43.7435 10.4623C42.7507 11.4469 41.4041 12 40 12C41.4041 12 42.7507 12.5531 43.7435 13.5377C44.7363 14.5223 45.2941 15.8576 45.2941 17.25Z" style="stroke-dasharray: 55.2092; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Account</h5>
                </a>
                <span class="align-items-center avatar bg-warning d-flex fs-12 fw-bold justify-content-center md position-absolute px-4 rounded-3 shadow-sm text-white" style="top: -12px; right: -12px;">Pro</span>
            </li>
            <!-- Icon: HRMS -->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('certificate.requests') }}" aria-label="Stay updated with your messages.">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M25 32.5C25 33.8261 25.5268 35.0979 26.4645 36.0355C27.4021 36.9732 28.6739 37.5 30 37.5C31.3261 37.5 32.5979 36.9732 33.5355 36.0355C34.4732 35.0979 35 33.8261 35 32.5C35 31.1739 34.4732 29.9021 33.5355 28.9645C32.5979 28.0268 31.3261 27.5 30 27.5C28.6739 27.5 27.4021 28.0268 26.4645 28.9645C25.5268 29.9021 25 31.1739 25 32.5Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M20 52.5V50C20 48.6739 20.5268 47.4021 21.4645 46.4645C22.4021 45.5268 23.6739 45 25 45H35C36.3261 45 37.5979 45.5268 38.5355 46.4645C39.4732 47.4021 40 48.6739 40 50V52.5" style="stroke-dasharray: 30.708; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M37.5 12.5C37.5 13.8261 38.0268 15.0979 38.9645 16.0355C39.9021 16.9732 41.1739 17.5 42.5 17.5C43.8261 17.5 45.0979 16.9732 46.0355 16.0355C46.9732 15.0979 47.5 13.8261 47.5 12.5C47.5 11.1739 46.9732 9.90215 46.0355 8.96447C45.0979 8.02678 43.8261 7.5 42.5 7.5C41.1739 7.5 39.9021 8.02678 38.9645 8.96447C38.0268 9.90215 37.5 11.1739 37.5 12.5Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M42.5 25H47.5C48.8261 25 50.0979 25.5268 51.0355 26.4645C51.9732 27.4021 52.5 28.6739 52.5 30V32.5" style="stroke-dasharray: 15.354; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M12.5 12.5C12.5 13.8261 13.0268 15.0979 13.9645 16.0355C14.9021 16.9732 16.1739 17.5 17.5 17.5C18.8261 17.5 20.0979 16.9732 21.0355 16.0355C21.9732 15.0979 22.5 13.8261 22.5 12.5C22.5 11.1739 21.9732 9.90215 21.0355 8.96447C20.0979 8.02678 18.8261 7.5 17.5 7.5C16.1739 7.5 14.9021 8.02678 13.9645 8.96447C13.0268 9.90215 12.5 11.1739 12.5 12.5Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M7.5 32.5V30C7.5 28.6739 8.02678 27.4021 8.96447 26.4645C9.90215 25.5268 11.1739 25 12.5 25H17.5" style="stroke-dasharray: 15.354; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Certificate</h5>
                </a>
            </li>
            <!-- Icon: Hospital-->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('feedbacks') }}" aria-label="Hospital Management Systems">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7.5 52.5H52.5" style="stroke-dasharray: 45; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M12.5 52.5V12.5C12.5 11.1739 13.0268 9.90215 13.9645 8.96447C14.9021 8.02678 16.1739 7.5 17.5 7.5H42.5C43.8261 7.5 45.0979 8.02678 46.0355 8.96447C46.9732 9.90215 47.5 11.1739 47.5 12.5V52.5" style="stroke-dasharray: 120.708; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M22.5 52.5V42.5C22.5 41.1739 23.0268 39.9021 23.9645 38.9645C24.9021 38.0268 26.1739 37.5 27.5 37.5H32.5C33.8261 37.5 35.0979 38.0268 36.0355 38.9645C36.9732 39.9021 37.5 41.1739 37.5 42.5V52.5" style="stroke-dasharray: 40.708; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M25 22.5H35" style="stroke-dasharray: 10; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M30 17.5V27.5" style="stroke-dasharray: 10; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Feedback</h5>
                </a>
            </li>
            <!-- Icon: Crypto-->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('students') }}" aria-label="Cryptocurrency coin">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M42.5 52.5V37.5M47.5 37.5V33.75M47.5 56.25V52.5M42.5 45H50M47.5 45H48.75M48.75 45C49.7446 45 50.6984 45.3951 51.4016 46.0984C52.1049 46.8016 52.5 47.7554 52.5 48.75C52.5 49.7446 52.1049 50.6984 51.4016 51.4016C50.6984 52.1049 49.7446 52.5 48.75 52.5H40M48.75 45C49.7446 45 50.6984 44.6049 51.4016 43.9016C52.1049 43.1984 52.5 42.2446 52.5 41.25C52.5 40.2554 52.1049 39.3016 51.4016 38.5983C50.6984 37.8951 49.7446 37.5 48.75 37.5H40" style="stroke-dasharray: 72.312; stroke-dashoffset: 0;"></path>
                            <path d="M20 17.5C20 20.1522 21.0536 22.6957 22.9289 24.5711C24.8043 26.4464 27.3478 27.5 30 27.5C32.6522 27.5 35.1957 26.4464 37.0711 24.5711C38.9464 22.6957 40 20.1522 40 17.5C40 14.8478 38.9464 12.3043 37.0711 10.4289C35.1957 8.55357 32.6522 7.5 30 7.5C27.3478 7.5 24.8043 8.55357 22.9289 10.4289C21.0536 12.3043 20 14.8478 20 17.5Z" style="stroke-dasharray: 62.8321; stroke-dashoffset: 0;"></path>
                            <path d="M15 52.5V47.5C15 44.8478 16.0536 42.3043 17.9289 40.4289C19.8043 38.5536 22.3478 37.5 25 37.5H32.5" style="stroke-dasharray: 28.208; stroke-dashoffset: 0;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Student</h5>
                </a>
            </li>
            <!-- Icon: transport-->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('blogs') }}" aria-label="transport Management Systems">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12.5 42.5C12.5 43.8261 13.0268 45.0979 13.9645 46.0355C14.9021 46.9732 16.1739 47.5 17.5 47.5C18.8261 47.5 20.0979 46.9732 21.0355 46.0355C21.9732 45.0979 22.5 43.8261 22.5 42.5C22.5 41.1739 21.9732 39.9021 21.0355 38.9645C20.0979 38.0268 18.8261 37.5 17.5 37.5C16.1739 37.5 14.9021 38.0268 13.9645 38.9645C13.0268 39.9021 12.5 41.1739 12.5 42.5Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0;"></path>
                            <path d="M37.5 42.5C37.5 43.8261 38.0268 45.0979 38.9645 46.0355C39.9021 46.9732 41.1739 47.5 42.5 47.5C43.8261 47.5 45.0979 46.9732 46.0355 46.0355C46.9732 45.0979 47.5 43.8261 47.5 42.5C47.5 41.1739 46.9732 39.9021 46.0355 38.9645C45.0979 38.0268 43.8261 37.5 42.5 37.5C41.1739 37.5 39.9021 38.0268 38.9645 38.9645C38.0268 39.9021 37.5 41.1739 37.5 42.5Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0;"></path>
                            <path d="M12.5 42.5H7.5V15C7.5 14.337 7.76339 13.7011 8.23223 13.2322C8.70107 12.7634 9.33696 12.5 10 12.5H32.5V42.5M22.5 42.5H37.5M47.5 42.5H52.5V27.5M52.5 27.5H32.5M52.5 27.5L45 15H32.5" style="stroke-dasharray: 171.004; stroke-dashoffset: 0;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Blog</h5>
                </a>
                <span class="align-items-center avatar bg-body text-primary d-flex fs-12 fw-bold justify-content-center position-absolute rounded-3 px-4 shadow-sm md" style="top: -12px; right: -12px;">New</span>
            </li>
            <!-- Icon: EV-->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('jobs') }}" aria-label="EV Charging Station Dashboard">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M45 17.5L42.5 20" style="stroke-dasharray: 3.53553; stroke-dashoffset: 0;"></path>
                            <path d="M35 27.5H37.5C38.8261 27.5 40.0979 28.0268 41.0355 28.9645C41.9732 29.9021 42.5 31.1739 42.5 32.5V40C42.5 40.9946 42.8951 41.9484 43.5984 42.6516C44.3016 43.3549 45.2554 43.75 46.25 43.75C47.2446 43.75 48.1984 43.3549 48.9016 42.6516C49.6049 41.9484 50 40.9946 50 40V22.5L42.5 15" style="stroke-dasharray: 57.7416; stroke-dashoffset: 0;"></path>
                            <path d="M10 50V15C10 13.6739 10.5268 12.4021 11.4645 11.4645C12.4021 10.5268 13.6739 10 15 10H30C31.3261 10 32.5979 10.5268 33.5355 11.4645C34.4732 12.4021 35 13.6739 35 15V50" style="stroke-dasharray: 100.708; stroke-dashoffset: 0;"></path>
                            <path d="M22.5 28.75L18.75 35H26.25L22.5 41.25" style="stroke-dasharray: 22.0774; stroke-dashoffset: 0;"></path>
                            <path d="M7.5 50H37.5" style="stroke-dasharray: 30; stroke-dashoffset: 0;"></path>
                            <path d="M10 20H35" style="stroke-dasharray: 25; stroke-dashoffset: 0;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Job</h5>
                </a>
                <span class="align-items-center avatar bg-body text-primary d-flex fs-12 fw-bold justify-content-center position-absolute rounded-3 px-4 shadow-sm md" style="top: -12px; right: -12px;">New</span>
            </li>
            <!-- Icon: Construction & Real Estate -->
            <li class="module-item position-relative">
                <a class="text-center animated-icon" href="{{ route('eds.referrals') }}" aria-label="EV Charging Station Dashboard">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 52.5V15C10 12.5 12.5 10 15 10H27.5C30 10 32.5 12.5 32.5 15V52.5" style="stroke-dasharray: 102.989; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M40 20H45C47.5 20 50 22.5 50 25V52.5" style="stroke-dasharray: 40.2444; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M7.5 52.5H52.5" style="stroke-dasharray: 45; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M16 19H18" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M16 27H18" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M16 35H18" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M24 19H26" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M24 27H26" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M24 35H26" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M16 43H18" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M24 43H26" style="stroke-dasharray: 2; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M40 27H42.5" style="stroke-dasharray: 2.5; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M40 37H42.5" style="stroke-dasharray: 2.5; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M40 47H42.5" style="stroke-dasharray: 2.5; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Refarrel</h5>
                </a>
                <span class="align-items-center avatar bg-body text-primary d-flex fs-12 fw-bold justify-content-center position-absolute rounded-3 px-4 shadow-sm md" style="top: -12px; right: -12px;">New</span>
            </li>
            <!-- Icon: IOT-->
            <li class="module-item">
                <a class="text-center animated-icon" href="{{ route('form.submits') }}" aria-label="IOT Dashboard">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 30H7.38889M30.5 4V6.88889M53.6111 30H56.5M12.0111 11.5111L14.0333 13.5333M48.9889 11.5111L46.9667 13.5333" style="stroke-dasharray: 14.3863; stroke-dashoffset: 0;"></path>
                            <path d="M21.3 41.7143C18.8654 39.9153 17.067 37.4072 16.1596 34.5453C15.2521 31.6833 15.2817 28.6126 16.2441 25.7682C17.2065 22.9237 19.0529 20.4497 21.5217 18.6965C23.9906 16.9434 26.9567 16 30 16C33.0433 16 36.0094 16.9434 38.4783 18.6965C40.9472 20.4497 42.7935 22.9237 43.7559 25.7682C44.7183 28.6126 44.7479 31.6833 43.8404 34.5453C42.933 37.4072 41.1346 39.9153 38.7 41.7143C37.5677 42.8185 36.7152 44.1698 36.2114 45.6589C35.7076 47.148 35.5667 48.733 35.8 50.2857C35.8 51.8012 35.1889 53.2547 34.1012 54.3263C33.0135 55.398 31.5383 56 30 56C28.4617 56 26.9865 55.398 25.8988 54.3263C24.8111 53.2547 24.2 51.8012 24.2 50.2857C24.4333 48.733 24.2924 47.148 23.7886 45.6589C23.2848 44.1698 22.4323 42.8185 21.3 41.7143Z" style="stroke-dasharray: 108.688; stroke-dashoffset: 0;"></path>
                            <path d="M23 44H37" style="stroke-dasharray: 14; stroke-dashoffset: 0;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Form Submits</h5>
                </a>
            </li>
            <!-- Icon: Project-->
            <li class="module-item">
                <a class="text-center animated-icon" href="{{ route('feedback.export') }}" aria-label="Organize and monitor project progress.">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M25 40V20H31.25C32.9076 20 34.4973 20.6585 35.6694 21.8306C36.8415 23.0027 37.5 24.5924 37.5 26.25C37.5 27.9076 36.8415 29.4973 35.6694 30.6694C34.4973 31.8415 32.9076 32.5 31.25 32.5H25" style="stroke-dasharray: 52.135; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M7.5 30C7.5 32.9547 8.08198 35.8806 9.21271 38.6104C10.3434 41.3402 12.0008 43.8206 14.0901 45.9099C16.1794 47.9992 18.6598 49.6566 21.3896 50.7873C24.1194 51.918 27.0453 52.5 30 52.5C32.9547 52.5 35.8806 51.918 38.6104 50.7873C41.3402 49.6566 43.8206 47.9992 45.9099 45.9099C47.9992 43.8206 49.6566 41.3402 50.7873 38.6104C51.918 35.8806 52.5 32.9547 52.5 30C52.5 27.0453 51.918 24.1194 50.7873 21.3896C49.6566 18.6598 47.9992 16.1794 45.9099 14.0901C43.8206 12.0008 41.3402 10.3434 38.6104 9.21271C35.8806 8.08198 32.9547 7.5 30 7.5C27.0453 7.5 24.1194 8.08198 21.3896 9.21271C18.6598 10.3434 16.1794 12.0008 14.0901 14.0901C12.0008 16.1794 10.3434 18.6598 9.21271 21.3896C8.08198 24.1194 7.5 27.0453 7.5 30Z" style="stroke-dasharray: 141.372; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Feedback Export</h5>
                </a>
            </li>
            <!-- Icon: My Products-->
            <li class="module-item">
                <a class="text-center animated-icon" href="{{ route('student.export') }}" aria-label="E-Commerce">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M25 35C25 36.3261 25.5268 37.5979 26.4645 38.5355C27.4021 39.4732 28.6739 40 30 40C31.3261 40 32.5979 39.4732 33.5355 38.5355C34.4732 37.5979 35 36.3261 35 35C35 33.6739 34.4732 32.4021 33.5355 31.4645C32.5979 30.5268 31.3261 30 30 30C28.6739 30 27.4021 30.5268 26.4645 31.4645C25.5268 32.4021 25 33.6739 25 35Z" style="stroke-dasharray: 31.416; stroke-dashoffset: 0;"></path>
                            <path d="M12.5026 20H47.5001C48.221 19.9999 48.9334 20.1557 49.5884 20.4568C50.2435 20.7578 50.8257 21.1969 51.2952 21.744C51.7646 22.2911 52.1102 22.9333 52.3083 23.6265C52.5063 24.3196 52.5521 25.0475 52.4425 25.76L49.3051 43.64C49.0327 45.4111 48.1352 47.0262 46.775 48.1928C45.4149 49.3594 43.682 50.0005 41.8901 50H18.1101C16.3185 49.9999 14.5863 49.3586 13.2266 48.192C11.867 47.0254 10.9699 45.4107 10.6976 43.64L7.56005 25.76C7.45047 25.0475 7.49627 24.3196 7.69431 23.6265C7.89236 22.9333 8.23795 22.2911 8.70741 21.744C9.17688 21.1969 9.7591 20.7578 10.4142 20.4568C11.0692 20.1557 11.7816 19.9999 12.5026 20Z" style="stroke-dasharray: 133.594; stroke-dashoffset: 0;"></path>
                            <path d="M42.5 25L37.5 10" style="stroke-dasharray: 15.8114; stroke-dashoffset: 0;"></path>
                            <path d="M17.5 25L22.5 10" style="stroke-dasharray: 15.8114; stroke-dashoffset: 0;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">Student Export</h5>
                </a>
            </li>
            <!-- Icon: New-->
            <li class="module-item">
                <a class="text-center animated-icon" href="{{ route('file.uploads') }}">
                    <div class="module-box rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M30 12.5V47.5" style="stroke-dasharray: 35; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                            <path d="M12.5 30H47.5" style="stroke-dasharray: 35; stroke-dashoffset: 0; transition: stroke-dashoffset 1s;"></path>
                        </svg>
                    </div>
                    <h5 class="module-title mb-0 mt-2">File Management</h5>
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection
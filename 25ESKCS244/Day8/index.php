<?php

include "header.php";

?>


<div class="container py-5">


    <div class="row justify-content-center">


        <div class="col-lg-9">


            <div class="card registration-card shadow-lg">


                <!-- Form Header -->


                <div class="form-header">


                    <i class="fa-solid fa-user-graduate fa-3x mb-3"></i>


                    <h2 class="fw-bold">

                        Student Registration

                    </h2>


                    <p class="mb-0">

                        Enter your details to complete your registration

                    </p>


                </div>



                <!-- Form Body -->


                <div class="card-body p-4 p-md-5">


                    <form action="process.php"
                          method="POST"
                          enctype="multipart/form-data">



                        <!-- Profile Photo Upload UI -->


                        <div class="text-center mb-4">


                            <div class="profile-placeholder mb-3">

                                <i class="fa-solid fa-user"></i>

                            </div>


                            <label for="photo"
                                   class="form-label fw-bold">

                                <i class="fa-solid fa-camera me-2"></i>

                                Student Photo

                            </label>


                            <input type="file"
                                   class="form-control"
                                   id="photo"
                                   name="photo"
                                   accept="image/*">


                            <small class="text-muted">

                                Choose a profile photo.
                                Photo upload is for display UI only.

                            </small>


                        </div>



                        <hr class="my-4">



                        <div class="row">



                            <!-- Name -->


                            <div class="col-md-6 mb-3">


                                <label for="name"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-user me-2 text-primary"></i>

                                    Full Name

                                </label>


                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Enter your full name">


                            </div>



                            <!-- Email -->


                            <div class="col-md-6 mb-3">


                                <label for="email"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-envelope me-2 text-primary"></i>

                                    Email Address

                                </label>


                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       placeholder="Enter your email">


                            </div>



                            <!-- CGPA -->


                            <div class="col-md-6 mb-3">


                                <label for="cgpa"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-chart-line me-2 text-primary"></i>

                                    CGPA

                                </label>


                                <input type="number"
                                       class="form-control"
                                       id="cgpa"
                                       name="cgpa"
                                       min="0"
                                       max="10"
                                       step="0.01"
                                       placeholder="Enter CGPA out of 10">


                            </div>



                            <!-- Branch -->


                            <div class="col-md-6 mb-3">


                                <label for="branch"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-code-branch me-2 text-primary"></i>

                                    Branch

                                </label>


                                <input type="text"
                                       class="form-control"
                                       id="branch"
                                       name="branch"
                                       placeholder="Example: CSE">


                            </div>



                            <!-- College -->


                            <div class="col-12 mb-3">


                                <label for="college"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-building-columns me-2 text-primary"></i>

                                    College

                                </label>


                                <input type="text"
                                       class="form-control"
                                       id="college"
                                       name="college"
                                       placeholder="Enter your college name">


                            </div>


                        </div>



                        <!-- Gender -->


                        <div class="mb-3">


                            <label class="form-label fw-bold">

                                <i class="fa-solid fa-venus-mars me-2 text-primary"></i>

                                Gender

                            </label>


                            <br>


                            <div class="form-check form-check-inline">


                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       id="male"
                                       value="Male">


                                <label class="form-check-label"
                                       for="male">

                                    Male

                                </label>


                            </div>



                            <div class="form-check form-check-inline">


                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       id="female"
                                       value="Female">


                                <label class="form-check-label"
                                       for="female">

                                    Female

                                </label>


                            </div>



                            <div class="form-check form-check-inline">


                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       id="other"
                                       value="Other">


                                <label class="form-check-label"
                                       for="other">

                                    Other

                                </label>


                            </div>


                        </div>



                        <!-- Course -->


                        <div class="mb-3">


                            <label for="course"
                                   class="form-label fw-bold">

                                <i class="fa-solid fa-book-open me-2 text-primary"></i>

                                Course

                            </label>


                            <select class="form-select"
                                    id="course"
                                    name="course">


                                <option value="">

                                    Select your course

                                </option>


                                <option value="B.Tech">

                                    B.Tech

                                </option>


                                <option value="BCA">

                                    BCA

                                </option>


                                <option value="MCA">

                                    MCA

                                </option>


                                <option value="BBA">

                                    BBA

                                </option>


                                <option value="MBA">

                                    MBA

                                </option>


                            </select>


                        </div>



                        <!-- Address -->


                        <div class="mb-4">


                            <label for="address"
                                   class="form-label fw-bold">

                                <i class="fa-solid fa-location-dot me-2 text-primary"></i>

                                Address

                            </label>


                            <textarea class="form-control"
                                      id="address"
                                      name="address"
                                      rows="4"
                                      placeholder="Enter your complete address"></textarea>


                        </div>



                        <!-- Submit Button -->


                        <button type="submit"
                                class="btn btn-primary text-white w-100 submit-btn">


                            <i class="fa-solid fa-paper-plane me-2"></i>


                            Submit Registration


                        </button>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>


<?php

include "footer.php";

?>
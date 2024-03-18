
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <meta name="robots" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta property="og:title" content="">
   <meta property="og:description" content="">
   <meta property="og:image" content="">
   <meta name="format-detection" content="telephone=no">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- PAGE TITLE HERE -->
   <title>Government of Tamil Nadu - Book Procurement</title>

   <!-- FAVICONS ICON -->
   <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
   <?php
   include "reviewer/plugin/plugin_css.php";
?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   <!--*******************
         Preloader start
         ********************-->
   <div id="preloader">
      <div class="text-center">
         <img src="images/goverment_loader.gif" alt="" width="25%">
      </div>
   </div>
   <!--*******************
         Preloader end
         ********************-->
   <!--**********************************
         Main wrapper start
         ***********************************-->
   <div id="main-wrapper">
      <!--**********************************
            Nav header start
            ***********************************-->
            @include ('reviewer.navigation')
      <!--**********************************
            Sidebar end
            ***********************************-->
      <!--**********************************
            Content body start
            ***********************************-->
      <div class="content-body">
         <div class="container-fluid">
            <div class="container bootdey">
               <div class="card mb-4">
                  <div class="card-body">
                     <div class="d-flex  justify-content-between">
                        <h3 class="mb-0 bc-title">
                           <b>All Books List</b>
                        </h3>
                        {{-- <a class="btn btn-primary  btn-sm" href="/reviewer/book_view/{{$book->id}}">
                           <i class="fas fa-book"></i> View Book</a> --}}
                     </div>
                  </div>
               </div>
               <section class="col-md-12">
                  <div class="row">
                     @if($rev->mark == null)
                     <div class="col-sm-12 col-md-12">
                        <div class="card">
                           <div class="card-header">
                              <div class="card-header-menu">
                                 <i class="fa fa-bars"></i>
                              </div>
                              <div class="card-header-headshot"></div>
                           </div>
                           <div class="card-content">
                              <div class="card-content-member">
                                  <div class="card-header bg-main text-white h3 p-2">{{$book->book_title}}</div>
                                 <!--<h4 class="m-t-0">{{$book->book_title}}</h4>-->
                                 {{-- <p class="m-0"><i class="pe-7s-map-marker"></i>December 2002</p> --}}
                              </div>
                              <div class="card-content-languages">
                                 <div class="card-content-languages-group">
                                    {{-- <div>
                                       <h4>By:</h4>
                                    </div>
                                    <div>
                                       <ul>
                                          <li>
                                             Osho(Athor)
                                             <div class="fluency fluency-4"></div>
                                          </li>
                                       </ul>
                                    </div> --}}
                                 </div>
                                 <div class="">
                                    <div>
                                        <h3 class="form-label">Book Id</h3>
                                       <h4>Book code: {{$book->product_code}}</h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-content-summary">
                                  <h3 class="form-label">Book Description</h3>
                                 <p class="text-start">{{$book->description}}</p>
                              </div>
                           </div>
                           
                           <div class="card-footer">
                              <form method="POST" action="/reviewer/review">
                                 @csrf
                               <div class="card p-5">
                               <input type="hidden" name="category" value={{$book->category}}>

                                 @if($book->category == "Fiction(புனைவு நூல்கள்)")
                                 <h3>Fiction(புனைவு நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Engaging Plot and Characters" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Engaging Plot and Characters
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Writing Quality and Style" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Writing Quality and Style
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Originality and Creativity" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Originality and Creativity
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Emotional Impact" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Emotional Impact
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Cultural and Contextual Relevance" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Cultural and Contextual Relevance
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Non Fiction(புனைவிலி நூல்கள்)")
                                    <h3>Non Fiction(புனைவிலி நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Accuracy and Credibility" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Accuracy and Credibility
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Clarity and Accessibility" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Clarity and Accessibility
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Relevance and Timeliness" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Relevance and Timeliness
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Depth of Analysis" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Depth of Analysis
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Practical Applications and Solutions" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Practical Applications and Solutions
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Competitive Examination Books(போட்டித்தேர்வு நூல்கள்)")
                                    <h3>Competitive Examination Books(போட்டித்தேர்வு நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Coverage of Syllabus and Exam Patterns" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Coverage of Syllabus and Exam Patterns
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Clarity and Conciseness of Content" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Clarity and Conciseness of Content
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Practice Questions and Mock Tests" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Practice Questions and Mock Tests
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Explanation of Concepts and Problem-solving Techniques" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Explanation of Concepts and Problem-solving Techniques
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Success Rate and Testimonials from Previous Users" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Success Rate and Testimonials from Previous Users
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Children Books(சிறுவர் நூல்கள்)")

                                    <h3>Children Books(சிறுவர் நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Engagement and Entertainment Value" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Engagement and Entertainment Value
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Educational Content and Learning Objectives" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Educational Content and Learning Objectives
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Age-Appropriate Language and Themes" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Age-Appropriate Language and Themes
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Illustrations and Visual Appeal" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Illustrations and Visual Appeal
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Positive Messages and Moral Values" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Positive Messages and Moral Values
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Academic Textbooks(பாட நூல்கள்)")

                                    <h3>Academic Textbooks(பாட நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Scholarly Rigor and Research Methodology" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Scholarly Rigor and Research Methodology
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Clarity and Organization of Content" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Clarity and Organization of Content
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Contribution to Scholarship and Disciplinary Knowledge" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Contribution to Scholarship and Disciplinary Knowledge
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Interdisciplinary Relevance" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Interdisciplinary Relevance
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Pedagogical Features and Learning Resources" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Pedagogical Features and Learning Resources
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Documentation Editions(ஆவணப் பதிப்பு நூல்கள்)")

                                    <h3>Documentation Editions(ஆவணப் பதிப்பு நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Accuracy and Authenticity of Information" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Accuracy and Authenticity of Information
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Comprehensive Coverage of Documents or Materials" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Comprehensive Coverage of Documents or Materials
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox"  name="review_remark[]" value="Clarity of Presentation and Organization" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Clarity of Presentation and Organization
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Editorial Commentary and Annotations" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Editorial Commentary and Annotations
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Cross-referencing and Citations" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Cross-referencing and Citations
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Government Publications(அரசு வெளியீடுகள்)")

                                    <h3>Government Publications(அரசு வெளியீடுகள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Accuracy and Reliability of Information" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Accuracy and Reliability of Information
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Compliance with Legal and Regulatory Standards" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Compliance with Legal and Regulatory Standards
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Accessibility and Availability to the Public" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Accessibility and Availability to the Public
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Clarity of Language and Communication" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Clarity of Language and Communication
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Relevance to Public Policy and Governance" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Relevance to Public Policy and Governance
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @elseif($book->category == "Translated Books(மொழிபெயர்ப்பு நூல்கள்)")

                                    <h3>Translated Books(மொழிபெயர்ப்பு நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Faithfulness to the Original Text" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Faithfulness to the Original Text
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="review_remark[]" value="Clarity and Fluency of Translation" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             Clarity and Fluency of Translation
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Cultural Sensitivity and Contextual Adaptation" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Cultural Sensitivity and Contextual Adaptation
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Accuracy of Terminology and Expressions" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Accuracy of Terminology and Expressions
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Recognition and Acknowledgment of Translator's Work" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Recognition and Acknowledgment of Translator's Work
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @else

                                    <h3>Translated Books(மொழிபெயர்ப்பு நூல்கள்) </h3>
                                    <div class="row mb-3">
                                       <div class="col-sm-10">
                                         <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="review_remark[]" value="Translation Quality (if translated)" id="gridCheck1">
                                           <label class="form-check-label" for="gridCheck1">
                                             Translation Quality (if translated)
                                           </label>
                                         </div>
                                       </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                          <input class="form-check-input" type="checkbox"  name="review_remark[]" value="International Recognition and Awards" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                             International Recognition and Awards
                                          </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Cultural Significance and Global Impact" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Cultural Significance and Global Impact
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Relevance to Local Readers" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Relevance to Local Readers
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-10">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="review_remark[]" value="Availability of Supplementary Materials or Resources"  id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                             Availability of Supplementary Materials or Resources
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    @endif
                             
                           </div>
                                 <div class=" mb-5">
                                    <input type="hidden" name="bookid" value={{$book->id}}>
                                    <input type="hidden" name="rev" value={{$rev->id}}>
                                    <label class="form-label text-left">Your Score <span class="text-danger maditory">*</span></label>
                                    <select class="form-control mb-3" name="review">
                                       <option value="Highly Recommended">Highly Recommended</option>
                                       <option value="May Be Considered">May be Considered</option>
                                       <option value="Not Recommended">Not Recommended</option>
                                    </select>
                                    <label class="form-label text-left">Remark <span class="text-danger maditory">*</span></label>
                                    <textarea class="form-control" name="about_book" rows="4" cols="5" required></textarea>
                                    <div class="rate bg-success py-3 text-white mt-3">
                                       <div class="buttons px-4 mt-0">
                                          <button class="btn btn-warning btn-block rating-submit">Submit</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     @endif
                     @if($rev->mark != null)
                     @php
                      $reviewer = auth('reviewer')->user();
                     @endphp
                     <div class="col-sm-12 col-md-12">
                        <div class="review-block">
                           <div class="row">
                              <div class="col-md-auto">
                                 <div class="review-block-img">
                                    <img src="{{ asset('reviewer/ProfileImage/'.$reviewer->profileImage) }}" class="img-rounded" alt="">
                                 </div>
                                 <div class="review-block-name"><b class=" ms-4">{{$reviewer->name}}</a></b></div>
                                 {{-- <div class="review-block-date">January 29, 2016<br>1 day ago</div> --}}
                              </div>
                              <div class="col-sm-9">
                                 <div class="review-block-title">{{$rev->review_type}}</div>
                                 <div class="review-block-description text-primary fw-bolder">{{$rev->remark}} </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
                  </div>
               </section>
            </div>
         </div>
      </div>
   </div>
   <!--**********************************
         Content body end
         ***********************************-->
   <!--**********************************
         Footer start
         ***********************************-->
         @include ("reviewer.footer")
   <!--**********************************
         Footer end
         ***********************************-->
   <!--**********************************
         Support ticket button start
         ***********************************-->
   <!--**********************************
         Support ticket button end
         ***********************************-->
   </div>
   <!--**********************************
         Main wrapper end
         ***********************************-->
   <style>
      /*** Portfolio page
         ==============================================================================*/
      .card {
         margin-bottom: 20px;
      }

      .card-header {
         position: relative;
         display: -webkit-box;
         display: -ms-flexbox;
         display: flex;
         -webkit-box-pack: center;
         -ms-flex-pack: center;
         justify-content: center;
         background-image: url('{{ asset("Books/full/".$book->full_img) }}');
         background-size: cover;
         background-position: center center;
         padding: 30px 15px;
         border-top-left-radius: 4px;
         border-top-right-radius: 4px;
      }

      .card-header-menu {
         position: absolute;
         top: 0;
         right: 0;
         height: 4em;
         width: 4em;
      }

      .card-header-menu:after {
         position: absolute;
         top: 0;
         right: 0;
         content: "";
         border-left: 2em solid transparent;
         border-bottom: 2em solid transparent;
         border-right: 2em solid #37a000;
         border-top: 2em solid #37a000;
         border-top-right-radius: 4px;
      }

      .card-header-menu i {
         position: absolute;
         top: 9px;
         right: 9px;
         color: #fff;
         z-index: 1;
      }

      .card-header-headshot {
         height: 6em;
         width: 6em;
         border-radius: 50%;
         border: 2px solid #37a000;
         background-image: url('{{ asset("reviewer/ProfileImage/".auth('reviewer')->user()->profileImage) }}');
         background-size: cover;
         background-position: center center;
         box-shadow: 1px 3px 3px #3E4142;
      }

      .card-content-member {
         position: relative;
         background-color: #fff;
         padding: 1em;
         box-shadow: 0 2px 2px rgba(62, 65, 66, 0.15);
      }

      .card-content-member {
         text-align: center;
      }

      .card-content-member p i {
         font-size: 16px;
         margin-right: 10px;
      }

      .card-content-languages {
         background-color: #fff;
         padding: 15px;
      }

      .card-content-languages .card-content-languages-group {
         display: -webkit-box;
         display: -ms-flexbox;
         display: flex;
         padding-bottom: 0.5em;
      }

      .card-content-languages .card-content-languages-group:last-of-type {
         padding-bottom: 0;
      }

      .card-content-languages .card-content-languages-group>div:first-of-type {
         -webkit-box-flex: 0;
         -ms-flex: 0 0 5em;
         flex: 0 0 5em;
      }

      .card-content-languages h4 {
         line-height: 1.5em;
         margin: 0;
         font-size: 15px;
         font-weight: 500;
         letter-spacing: 0.5px;
      }

      .card-content-languages li {
         display: inline-block;
         padding-right: 0.5em;
         font-size: 0.9em;
         line-height: 1.5em;
      }

      .card-content-summary {
         background-color: #fff;
         padding: 15px;
      }

      .card-content-summary p {
         text-align: center;
         font-size: 12px;
         font-weight: 600;
      }

      .card-footer-stats {
         display: -webkit-box;
         display: -ms-flexbox;
         display: flex;
         background-color: #2c3136;
      }

      .card-footer-stats div {
         -webkit-box-flex: 1;
         -ms-flex: 1 0 33%;
         flex: 1 0 33%;
         padding: 0.75em;
      }

      .card-footer-stats div:nth-of-type(2) {
         border-left: 1px solid #3E4142;
         border-right: 1px solid #3E4142;
      }

      .card-footer-stats p {
         font-size: 0.8em;
         color: #A6A6A6;
         margin-bottom: 0.4em;
         font-weight: 600;
         text-transform: uppercase;
      }

      .card-footer-stats i {
         color: #ddd;
      }

      .card-footer-stats span {
         color: #ddd;
      }

      .card-footer-stats span.stats-small {
         font-size: 0.9em;
      }

      .card-footer-message {
         background-color: #37a000;
         padding: 15px;
         border-bottom-left-radius: 4px;
         border-bottom-right-radius: 4px;
      }

      .card-footer-message h4 {
         margin: 0;
         text-align: center;
         color: #fff;
         font-weight: 400;
      }

      .review-number {
         float: left;
         width: 35px;
         line-height: 1;
      }

      .review-number div {
         height: 9px;
         margin: 5px 0
      }

      .review-progress {
         float: left;
         width: 230px;
      }

      .review-progress .progress {
         margin: 8px 0;
      }

      .progress-number {
         margin-left: 10px;
         float: left;
      }

      .rating-block,
      .review-block {
         background-color: #fff;
         border: 1px solid #e1e6ef;
         padding: 15px;
         border-radius: 4px;
         margin-bottom: 20px;
      }

      .review-block {
         margin-bottom: 20px;
      }

      .review-block-img img {
         height: 75px;
         width: 75px;
      }

      .review-block-name {
         font-size: 12px;
         margin: 10px 0;
         font-weight: 600;
         text-transform: uppercase;
         letter-spacing: 0.5px;
      }

      .review-block-name a {
         color: #374767;
      }

      .review-block-date {
         font-size: 12px;
      }

      .review-block-rate {
         font-size: 13px;
         margin-bottom: 15px;
      }

      .review-block-title {
         font-size: 15px;
         font-weight: 700;
         margin-bottom: 10px;
      }

      .review-block-description {
         font-size: 13px;
      }

      /* Widgets page
         ==============================================================================*/
      /*-- Monthly calender --*/
      .monthly_calender {
         width: 100%;
         max-width: 600px;
         display: inline-block;
      }

      /*-- Profile widget --*/
      .profile-widget .panel-heading {
         min-height: 200px;
         background: #fff;
         background-size: cover;
      }

      .profile-widget .media-heading {
         color: #5B5147;
      }

      .profile-widget .panel-body {
         padding: 25px 15px;
      }

      .profile-widget .panel-body .img-circle {
         height: 90px;
         width: 90px;
         padding: 8px;
         border: 1px solid #e2dfdc;
      }

      .profile-widget .panel-footer {
         padding: 0px;
         border: none;
      }

      .profile-widget .panel-footer .btn-group .btn {
         border: none;
         font-size: 1.2em;
         background-color: #F6F1ED;
         color: #BAACA3;
         border-top-left-radius: 0px;
         border-top-right-radius: 0px;
         padding: 15px 0;
      }

      .profile-widget .panel-footer .btn-group .btn:hover {
         color: #F6F1ED;
         background-color: #8F7F70;
      }

      .profile-widget .panel-footer .btn-group>.btn:not(:first-child) {
         border-left: 1px solid #fff;
      }

      .profile-widget .panel-footer .btn-group .highlight {
         color: #E56E4C;
      }

      .circle-image img {
         border: 6px solid #fff;
         border-radius: 100%;
         padding: 0px;
         top: -28px;
         position: relative;
         width: 70px;
         height: 70px;
         border-radius: 100%;
         z-index: 1;
         background: #e7d184;
         cursor: pointer;
      }

      .dot {
         height: 18px;
         width: 18px;
         background-color: blue;
         border-radius: 50%;
         display: inline-block;
         position: relative;
         border: 3px solid #fff;
         top: -48px;
         left: 186px;
         z-index: 1000;
      }

      .name {
         margin-top: -21px;
         font-size: 18px;
      }

      .fw-500 {
         font-weight: 500 !important;
      }

      .start {
         color: green;
      }

      .stop {
         color: red;
      }

      .rate {
         border-bottom-right-radius: 12px;
         border-bottom-left-radius: 12px;
      }

      .rating {
         display: flex;
         flex-direction: row-reverse;
         justify-content: flex-start;
      }

      .rating>input {
         display: none
      }

      .rating>label {
         position: relative;
         width: 1em;
         font-size: 30px;
         font-weight: 300;
         color: #FFD600;
         cursor: pointer
      }
.bg-main {
    background-color: #222B40;
}
      .rating>label::before {
         content: "\2605";
         position: absolute;
         opacity: 0
      }

      .rating>label:hover:before,
      .rating>label:hover~label:before {
         opacity: 1 !important
      }

      .rating>input:checked~label:before {
         opacity: 1
      }

      .rating:hover>input:checked~label:before {
         opacity: 0.4
      }

      .buttons {
         top: 36px;
         position: relative;
      }

      .rating-submit {
         border-radius: 15px;
         color: #fff;
         height: 49px;
      }

      .rating-submit:hover {
         color: #fff;
      }
   </style>
 <?php
 include "reviewer/plugin/plugin_js.php";
?>
</body>

</html>

$(function () {
  "use strict";

  /* ==Start New Ad Validations== */
    
    /* ==Start Errors Config== */
      var
        itemNameErr =true,  // Item Name Input Field Error Validation.
        itemPricErr =true,  // Item Price Input Field Error Validation.
        itemDescErr =true,  // Item Description Input Field Error Validation.
        itemCateErr =true,  // Item Category Input Field Error Validation.
        itemStatErr =true,  // Item Status Input Field Error Validation.
        itemMBidErr =true,  // Item Minimum Bid Input Field Error Validation.
        itemImgsErr =true,  // Item` Images Input Field Error Validation.
        itemTagsErr =true,  // Item Tags Input Field Error Validation.
        itemCounErr =true;  // Item Country Input Field Error Validation.
    /* ==End Errors Config== */

    /* ==Start Validate Item Name== */
      $('.valid-item-name').on('input', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <3) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Length Check== */
      });
      $('.valid-item-name').on('blur', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <3) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemNameErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemNameErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length Check== */
      });
    /* ==End Validate Item Name== */

    /* ==Start Validate Item Price== */
      $('.valid-item-pric').on('input', function () { // ^\\d+$
        /* ==Start Declare Number Regular Expression== */
          var regExp = '^\\d+$';
        /* ==End Declare Number Regular Expression== */
        /* ==Start Numeric Check== */
          if (!$(this).val().match(regExp) || $(this).val().length < 0) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemPricErr = true;
            /* ==End Initiate Err== */
            /* ==Start Prevent Default== */
                // e.preventDefault();
            /* ==End Prevent Default== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemPricErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Numeric Check== */
      });
    /* ==End Validate Item Price== */

    /* ==Start Validate Item Minimum Bid== */
      $('.valid-item-mbid').on('input', function () {
        /* ==Start Declare Number Regular Expression== */
          var regExp = '^\\d+$';
        /* ==End Declare Number Regular Expression== */
        /* ==Start Numeric Check== */
          if (!$(this).val().match(regExp) || $(this).val().length < 0) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Numeric Check== */
      });
      $('.valid-item-mbid').on('blur', function () {
        /* ==Start Declare Number Regular Expression== */
          var regExp = '^\\d+$';
        /* ==End Declare Number Regular Expression== */
        /* ==Start Numeric Check== */
          if (!$(this).val().match(regExp) || $(this).val().length < 0) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemMBidErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemMBidErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Numeric Check== */
      });
    /* ==End Validate Item Minimum Bid== */

    /* ==Start Validate Item Description== */
      $('.valid-item-desc').on('input', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <10 || $(this).val().length >50) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Length Check== */
      });
      $('.valid-item-desc').on('blur', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <10 || $(this).val().length >50) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemDescErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemDescErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length Check== */
      });
    /* ==End Validate Item Description== */

    /* ==Start Validate Category== */
      $('.valid-item-cate').on('change', function () {
        /* ==Start Empty Check== */
          if (!$(this).val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Empty Check== */
      });
      $('.valid-item-cate').on('blur', function () {
        /* ==Start Empty Check== */
          if (!$(this).val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemCateErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemCateErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Empty Check== */
      });
    /* ==End Validate Category== */

    /* ==Start Validate Status== */
      $('.valid-item-stat').on('change', function () {
        /* ==Start Empty Check== */
          if (!$(this).val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Empty Check== */
      });
      $('.valid-item-stat').on('blur', function () {
        /* ==Start Empty Check== */
          if (!$(this).val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemStatErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemStatErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Empty Check== */
      });
    /* ==End Validate Status== */

    /* ==Start Validate Item Images== */
      $('.valid-item-imgs').on('change', function () {
        /* ==Start Empty Check== */
          if ($(this).val().length != '') {
            /* ==Start Remove Error== */
              itemImgsErr = false;
            /* ==End Remove Error== */
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Error== */
              $('#imgs-errs').fadeOut(50);
            /* ==End Hide Error== */
            /* ==Start Count Files== */
              var imgsCount = $(this).get(0).files.length;
            /* ==End Count Files== */
            /* ==Start Count Check== */
                if (imgsCount >=3) {
                  /* ==Start Remove Error== */
                    itemImgsErr = false;
                  /* ==End Remove Error== */
                  /* ==Start Files Loop== */
                    for (let i = 0; i < imgsCount; i++) {
                      /* ==Start Declare File Property== */
                        var
                          imgName = $(this).get(0).files[i].name, // File Name.
                          imgSize = $(this).get(0).files[i].size; // File Size.
                      /* ==End Declare File Property== */
                      /* ==Start Size Check== */
                        if (imgSize<4194304) {
                          /* ==Start Remove Error== */
                            itemImgsErr = false;
                          /* ==End Remove Error== */
                          /* ==Start Declare Variables== */
                            var
                              imgExtension =
                                imgName.split('.').pop().toLowerCase(), // Image Extension
                              extensions = [
                                'jpeg',
                                'jpg',
                                'gif',
                                'png'
                              ];  // Allowed Extensions
                          /* ==End Declare Variables== */
                          /* ==Start Extension Check== */
                            if ($.inArray(
                              imgExtension,
                              extensions
                            ) === -1) {
                              /* ==Start Initiate Error== */
                                itemImgsErr = true;
                              /* ==End Initiate Error== */
                              /* ==Start Input Border== */
                                $(this).css(
                                  'border',
                                  '1px solid #EC7063'
                                );
                              /* ==End Input Border== */
                              /* ==Start Error Message== */
                                $('#imgs-errs').html(
                                  ':( Oops Image "<strong>' +imgName+ '</strong>" is <Strong>Not Allowed</strong>. :('
                                );
                              /* ==End Error Message== */
                              /* ==Start Show Error== */
                                $('#imgs-errs').fadeIn(200);
                              /* ==End Show Error== */
                            } else {
                              /* ==Start Input Border== */
                                $(this).css(
                                  'border',
                                  '1px solid #28B463'
                                );
                              /* ==End Input Border== */
                              /* ==Start Hide Error== */
                                $('#imgs-errs').fadeOut(50);
                              /* ==End Hide Error== */
                              /* ==Start Remove Error== */
                                itemImgsErr = false;
                              /* ==End Remove Error== */
                            }
                          /* ==End Extension Check== */
                        } else {
                          /* ==Start Initiate Error== */
                            itemImgsErr = true;
                          /* ==End Initiate Error== */
                          /* ==Start Input Border== */
                            $(this).css(
                              'border',
                              '1px solid #EC7063'
                            );
                          /* ==End Input Border== */
                          /* ==Start Error Message== */
                            $('#imgs-errs').html(
                              ':( Oops Image "<strong>' +imgName+ '</strong>" is Too Big Where Max Size Must Be <Strong>4MB</strong>. :('
                            );
                          /* ==End Error Message== */
                          /* ==Start Show Error== */
                            $('#imgs-errs').fadeIn(200);
                          /* ==End Show Error== */
                        }
                      /* ==End Size Check== */
                    }
                  /* ==End Files Loop== */
                } else {
                  /* ==Start Input Border== */
                    $(this).css(
                      'border',
                      '1px solid #EC7063'
                    );
                  /* ==End Input Border== */
                  /* ==Start Error Message== */
                    $('#imgs-errs').html(':( Oops Each Ad Must Have At Least <Strong>3 Images</strong>. :(');
                  /* ==End Error Message== */
                  /* ==Start Show Error== */
                    $('#imgs-errs').fadeIn(200);
                  /* ==End Show Error== */
                  /* ==Start Initiate Error== */
                    itemImgsErr = true;
                  /* ==End Initiate Error== */
                }
            /* ==End Count Check== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Error Message== */
              $('#imgs-errs').html(':( Oops Images is <Strong>Manadatory</strong> Input. :(');
            /* ==End Error Message== */
            /* ==Start Show Error== */
              $('#imgs-errs').fadeIn(200);
            /* ==End Show Error== */
            /* ==Start Initiate Error== */
              itemImgsErr = true;
            /* ==End Initiate Error== */
          }
        /* ==End Empty Check== */
      });
    /* ==End Validate Item Images== */

    /* ==Start Validate Item country== */
      $('.valid-item-coun').on('input', function () {
        /* ==Start Empty Check== */
          if ($(this).val().length < 2) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Empty Check== */
      });
      $('.valid-item-coun').on('blur', function () {
        /* ==Start Empty Check== */
          if ($(this).val().length <2) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              itemCounErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              itemCounErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Empty Check== */
      });
    /* ==End Validate Item country== */

    /* ==Start Show Tags== */
      /* ==Start Declare Global Variables== */
        var
          i = 0,  // Index Initialization.
          tags = new Array(
            $('.tags-factory').parent().find('.tags .tag').text()
          );  // Tags array.
      /* ==End Declare Variables== */
      /* ==Start Input Event== */
        $('.tags-factory').on('keyup', function (e) {
          var key = e.keyCode || e.which; // Declare Local Key Code Variable.
          /* ==Start Not Space Check== */
            if (key !== 32) {
              /* ==Start Comma Check== */
                if (key === 188) {
                  var tag = $(this).val().slice(0, -1); // Declare Local Conditional Input Value Without Comma Variable.
                  /* ==Start Value Not In Array(Not Repeated) Check== */
                    if ($.inArray(
                        tag,
                        tags
                      ) === -1
                    ) {
                      i++;  // Index Increment.
                      /* ==Start Not Empty Check== */
                        if (tag != '') {
                          /* ==Start Not Dot Check== */
                            if (tag != '.') {
                              tags[i] = $(this).val().slice(0, -1);   // Insert Input Values Into Array Without Commas.
                              /* ==Start Input Border== */
                                $(this).css(
                                    'border',
                                    '1px solid #28B463'
                                );
                              /* ==End Input Border== */
                              /* ==Start Append DOM Element== */
                                $('.tags').append(
                                  '<span class="tag"><i class="fa fa-times"></i>' +tag+ '</span>'
                                );
                              /* ==End Append DOM Element== */
                              itemTagsErr = false;  // Remove Error.
                            }
                          /* ==End Not Dot Check== */
                          /* ==Start Dot Check== */
                            else {
                              /* ==Start Input Border== */
                                $(this).css(
                                  'border',
                                  '1px solid #EC7063'
                                );
                              /* ==End Input Border== */
                              itemTagsErr = true;  // Activate Error.
                            }
                          /* ==End Dot Check== */
                        }
                      /* ==End Not Empty Check== */
                      $(this).val('');      // Clear Input Value.
                    }
                  /* ==End Value Not In Array(Not Repeated) Check== */
                  /* ==Start Value In Array(Repeated) Check== */
                    else {
                      i++;                  // Index Increment.
                      e.preventDefault();   // Prevent Default Actions.
                      $(this).val('');      // Clear Input Value.
                      /* ==Start Input Border== */
                        $(this).css(
                          'border',
                          '1px solid #EC7063'
                        );
                      /* ==End Input Border== */
                      alert('you have already entered this tag!!');   // Alert Message.
                      itemTagsErr = true;                             // Activate Error.
                    }
                  /* ==End Value In Array(Repeated) Check== */
                }
              /* ==End Comma Check== */
            }
          /* ==End Not Space Check== */
          /* ==Start Space Check== */
            else {
              $(this).val('');  // Clear Input Value.
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #EC7063'
                );
              /* ==End Input Border== */
              alert('Spaces Are Not Allowed Into Tags Input..');  // Alert Message.
            }
          /* ==End Space Check== */
        });
      /* ==End Input Event== */
    /* ==End Show Tags== */

    /* Start Remove Tags */
      $('.tags').on('click', '.tag i', function () {
        /* ==Start Delete Array Clicked Value== */
          tags.splice(
            tags.indexOf($(this).parent().text()),
            1
          );
        /* ==End Delete Array Clicked Value== */
        /* ==Start Hide Tag== */
          $(this).parent('.tag').fadeOut(400);
        /* ==End Hide Tag== */
      });
    /* End Remove Tags */

    /* ==Start Form Submit== */
      $('.item-form').on('submit', function (e) {
        /* ==Start Errors Check== */
          if (
            itemNameErr == true ||
            itemPricErr == true ||
            itemDescErr == true ||
            itemCateErr == true ||
            itemStatErr == true ||
            itemMBidErr == true ||
            itemImgsErr == true ||
            itemTagsErr == true ||
            itemCounErr == true
          ) {
            e.preventDefault();
            /* ==Start Show Error Message== */
              $('#item-form-alert').fadeIn(200);
            /* ==End Show Error Message== */
          }
        /* ==End Errors Check== */
        /* ==Start Cut First Empty Tag== */
          tags.splice(0,1);
        /* ==End Cut First Empty Tag== */
        /* ==Start Insert Tags Into Hidden Input== */
          $('#item-tag').val(tags); // Used For Database 
        /* ==End Insert Tags Into Hidden Input== */
        /* ==Start Hide Error Message== */
          $('#item-form-alert').fadeOut(50);
        /* ==End Hide Error Message== */
      });
    /* ==End Form Submit== */

  /* ==End New Ad Validations== */

  /* ==Start Registeration/Login Form Vlidations== */

    /* ==Start Errors Config== */
      var
        usernameErr   = true, // Username Input Field Error Validation.
        bidderPassErr = true, // Bidder Password Input Field Error Validation.
        bidderConfErr = true, // Bidder Confirmation Password Input Field Error Validation.
        sellerPassErr = true, // Seller Password Input Field Error Validation.
        sellerConfErr = true, // Seller Confirmation Password Input Field Error Validation.
        userMailErr   = true, // User Email Input Field Error Validation.
        userPhonErr   = true, // User Phone Input Field Error Validation.
        userCounErr   = true; // User Country Input Field Error Validation.
    /* ==End Errors Config== */

    /* ==Start Validate Usename== */
      $('.valid-name').on('input', function () {
        /* ==Start Length Check== */
            if ($(this).val().length <3) {
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #EC7063'
                );
              /* ==End Input Border== */
            } else {
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #28B463'
                );
              /* ==End Input Border== */
              /* ==Start Hide Msg== */
                $(this).parent().find('.custom-alert').fadeOut(50);
              /* ==End Hide Msg== */
            }
          /* ==End Length Check== */
      });
        $('.valid-name').on('blur', function () {
          /* ==Start Length Check== */
            if ($(this).val().length <3) {
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #EC7063'
                );
              /* ==End Input Border== */
              /* ==Start Show Msg== */
                $(this).parent().find('.custom-alert').fadeIn(200);
              /* ==End Show Msg== */
              /* ==Start Initiate Err== */
                usernameErr = true;
              /* ==End Initiate Err== */
            } else {
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #28B463'
                );
              /* ==End Input Border== */
              /* ==Start Hide Msg== */
                $(this).parent().find('.custom-alert').fadeOut(50);
              /* ==End Hide Msg== */
              /* ==Start Remove Err== */
                usernameErr = false;
              /* ==End Remove Err== */
            }
          /* ==End Length Check== */
        });
    /* ==End Validate Username== */

    /* ==Start Validate Bidder Password== */
      $('.valid-pass').on('blur input focus', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <4) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              bidderPassErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==Start Remove Err== */
              bidderPassErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length Check== */
      });
      $('.valid-pass').on('copy', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-pass').on('cut', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-pass').on('paste', function(e) { 
        e.preventDefault(); 
      });
    /* ==End Validate Bidder Password== */

    /* ==Start Validate Bidder Confirmation Password== */
      $('.valid-conf').on('blur input focus', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <4 || $(this).val() !== $('.valid-pass').val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              bidderConfErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              bidderConfErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length Check== */
      });
      $('.valid-conf').on('copy', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-conf').on('cut', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-conf').on('paste', function(e) { 
        e.preventDefault(); 
      });
    /* ==End Validate Bidder Confirmation Password== */

    /* ==Start Validate Seller Password== */
      $('.valid-seller-pass').on('blur input focus', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <4) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              sellerPassErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==Start Remove Err== */
              sellerPassErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length Check== */
      });
      $('.valid-seller-pass').on('copy', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-seller-pass').on('cut', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-seller-pass').on('paste', function(e) { 
        e.preventDefault(); 
      });
    /* ==End Validate Seller Password== */

    /* ==Start Validate Seller Confirmation Password== */
      $('.valid-seller-conf').on('blur input focus', function () {
        /* ==Start Length Check== */
          if ($(this).val().length <4 || $(this).val() !== $('.valid-seller-pass').val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              sellerConfErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              sellerConfErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length Check== */
      });
      $('.valid-seller-conf').on('copy', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-seller-conf').on('cut', function(e) { 
        e.preventDefault(); 
      });
      $('.valid-seller-conf').on('paste', function(e) { 
        e.preventDefault(); 
      });
    /* ==End Validate Seller Confirmation Password== */

    /* ==Start Validate Email== */
    $('.valid-mail').on('input', function () {
      /* ==Start Declare Email Format== */
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      /* ==End Declare Email Format== */
      /* ==Start Length/Valid Email Check== */
          if ($(this).val() === '' || $(this).val().match(mailformat) === null) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Length/Valid Email Check== */
    });
      $('.valid-mail').on('blur', function () {
        /* ==Start Declare Email Format== */
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        /* ==End Declare Email Format== */
        /* ==Start Length/Valid Email Check== */
          if ($(this).val() === '' || $(this).val().match(mailformat) === null) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              userMailErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              userMailErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length/Valid Email Check== */
      });
    /* ==End Validate Email== */
    
/* ==Start Validate Phone== */
    $('.valid-phon').on('input', function () {
      /* ==Start Declare Phone Format== */
        var phonformat = /^[+0-9-]+$/;
      /* ==End Declare Phone Format== */
      /* ==Start Length/Valid Phone Check== */
          if ($(this).val().length < 10 || $(this).val().length >13  || $(this).val().match(phonformat) === null) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
          }
        /* ==End Length/Valid Phone Check== */
    });
      $('.valid-phon').on('blur', function () {
        /* ==Start Declare Phone Format== */
        var phonformat = /^[+0-9-]+$/;
        /* ==End Declare Phone Format== */
        /* ==Start Length/Valid Phone Check== */
        if ($(this).val().length < 10 || $(this).val().length >13  || $(this).val().match(phonformat) === null) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              userPhonErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              userPhonErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Length/Valid Phone Check== */
      });
    /* ==End Validate Phone== */

    /* ==Start Validate Country== */
      $('.valid-coun').on('change', function () {
        /* ==Start Empty Check== */
            if (!$(this).val()) {
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #EC7063'
                );
              /* ==End Input Border== */
            } else {
              /* ==Start Input Border== */
                $(this).css(
                  'border',
                  '1px solid #28B463'
                );
              /* ==End Input Border== */
              /* ==Start Hide Msg== */
                $(this).parent().find('.custom-alert').fadeOut(50);
              /* ==End Hide Msg== */
            }
          /* ==End Empty Check== */
      });
      $('.valid-coun').on('blur', function () {
        /* ==Start Empty Check== */
          if (!$(this).val()) {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #EC7063'
              );
            /* ==End Input Border== */
            /* ==Start Show Msg== */
              $(this).parent().find('.custom-alert').fadeIn(200);
            /* ==End Show Msg== */
            /* ==Start Initiate Err== */
              userCounErr = true;
            /* ==End Initiate Err== */
          } else {
            /* ==Start Input Border== */
              $(this).css(
                'border',
                '1px solid #28B463'
              );
            /* ==End Input Border== */
            /* ==Start Hide Msg== */
              $(this).parent().find('.custom-alert').fadeOut(50);
            /* ==End Hide Msg== */
            /* ==Start Remove Err== */
              userCounErr = false;
            /* ==End Remove Err== */
          }
        /* ==End Empty Check== */
      });
    /* ==End Validate Country== */

    /* ==Start Validate Registeration Submit== */
      $(  
        '.bidder-reg-form'
      ).on(
        'submit',
        function (e) {
          if (
                usernameErr   === true ||
                bidderPassErr === true ||
                bidderConfErr === true ||
                userMailErr   === true ||
                userPhonErr   === true ||
                userCounErr   === true
              ) {
                e.preventDefault();
                $('#bidder-reg-form-alert').fadeIn(200);
          } else {
            $('#bidder-reg-form-alert').fadeOut(50);
          }
      });

      $(  
        '.seller-reg-form'
      ).on(
        'submit',
        function (e) {
          if (
                usernameErr   === true ||
                sellerPassErr === true ||
                sellerConfErr === true ||
                userMailErr   === true ||
                userPhonErr   === true ||
                userCounErr   === true
              ) {
                e.preventDefault();
                $('#seller-reg-form-alert').fadeIn(200);
          } else {
            $('#seller-reg-form-alert').fadeOut(50);
          }
      });

      /* ==Start Tab Switching== */
      // The Registeration Bug I Told U About
        // $('#seller-reg').on('click', function name() {
        //   console.log('test');
        //   $('#home-tab').toggleClass('active').attr('aria-selected', false);
        //   $('#profile-tab').toggleClass('active').attr('aria-selected', true);
        // });
      /* ==End Tab Switching== */

    /* ==End Validate Registeration Submit== */

    /* Start Validat Login Submit */
      $(  
        '.login-form-bidder'
      ).on(
        'submit',
        function (e) {
          if (
                usernameErr   === true ||
                bidderPassErr === true
              ) {
                e.preventDefault();
                $('#bidder-log-form-alert').fadeIn(200);
          } else {
            $('#bidder-log-form-alert').fadeOut(50);
            /* ==Start Tab Switching== */

            /* ==End Tab Switching== */
          }
      });

      $(  
        '.login-form-seller'
      ).on(
        'submit',
        function (e) {
          if (
                usernameErr   === true ||
                sellerPassErr === true
              ) {
                e.preventDefault();
                $('#seller-log-form-alert').fadeIn(200);
          } else {
            $('#seller-log-form-alert').fadeOut(50);
            /* ==Start Tab Switching== */

            /* ==End Tab Switching== */
          }
      });
    /* End Validat Login Submit */

  /* ==End Registeration/Login Form Vlidations== */

	/* ==Start Hide Input Placeholder Function On Form Focus== */
		$('[placeholder]').on('focus', function () {
			// first: Extract the placeholder value into data-text.
			$(this).attr(
        'data-text',
        $(this).attr('placeholder')
      );
			// then: assigns empty string value to placeholder.
			$(this).attr('placeholder', '');
		}).on('blur', function () {
			// retrieves the data-text value back again to placeholder.
			$(this).attr(
        'placeholder',
        $(this).attr('data-text')
      );
		});
  /* ==End Hide Input Placeholder Function On Form Focus== */

  /* ==Start Registeration Navbar switcher== */
    $('.reg-nav').on('click', function () {
      $('form .custom-alert').hide();
    });
  /* ==End Registeration Navbar switcher== */

  /* ==Start Bidder/Seller Switcher== */
    $('.login-container h1 span').on('click', function () {
      if ($(this).data('class') == 'login-form-bidder') {
        $(this).css({
          'color': '#408fe6'
        }).siblings('span').css({
          'color': '#C0C0C0'
        });
      } else {
        $(this).css({
          'color': '#408fe6'
        }).siblings('span').css({
          'color': '#C0C0C0'
        });
      }
      $('.msg').toggleClass('sel-err');
      $('.login-container form').hide();
      $('.' +$(this).data('class')).fadeIn(100);
    });
  /* ==End Bidder/Seller Switcher== */

  //sidebar menu js
  $.sidebarMenu($('.sidebar-menu'));

  // === toggle-menu js
  $(".toggle-menu").on("click", function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  // === sidebar menu activation js

  $(function () {
      for (var i = window.location, o = $(".sidebar-menu a").filter(function () {
          return this.href == i;
        }).addClass("active").parent().addClass("active");;) {
        if (!o.is("li")) break;
        o = o.parent().addClass("in").parent().addClass("active");
      }
    }),




    /* Back To Top */

    $(document).ready(function () {
      $(window).on("scroll", function () {
        if ($(this).scrollTop() > 300) {
          $('.back-to-top').fadeIn();
        } else {
          $('.back-to-top').fadeOut();
        }
      });

      $('.back-to-top').on("click", function () {
        $("html, body").animate({
          scrollTop: 0
        }, 600);
        return false;
      });
    });


  // page loader

  $(window).on('load', function () {
    $('#pageloader-overlay').fadeOut(1000);
  })


  $(function () {
    $('[data-toggle="popover"]').popover()
  })


  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


  // theme setting
  $(".switcher-icon").on("click", function (e) {
    e.preventDefault();
    $(".right-sidebar").toggleClass("right-toggled");
  });

  $('#theme1').click(theme1);
  $('#theme2').click(theme2);
  $('#theme3').click(theme3);
  $('#theme4').click(theme4);
  $('#theme5').click(theme5);
  $('#theme6').click(theme6);

  function theme1() {
    $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme1');
  }

  function theme2() {
    $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme2');
  }

  function theme3() {
    $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme3');
  }

  function theme4() {
    $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme4');
  }

  function theme5() {
    $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme5');
  }

  function theme6() {
    $('#sidebar-wrapper').attr('class', 'bg-theme bg-theme6');
  }


  // header setting 

  $('#header1').click(header1);
  $('#header2').click(header2);
  $('#header3').click(header3);
  $('#header4').click(header4);
  $('#header5').click(header5);
  $('#header6').click(header6);

  function header1() {
    $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme1');
  }

  function header2() {
    $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme2');
  }

  function header3() {
    $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme3');
  }

  function header4() {
    $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme4');
  }

  function header5() {
    $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme5');
  }

  function header6() {
    $('#header-setting').attr('class', 'navbar navbar-expand fixed-top color-header bg-theme6');
  }



  // default header & sidebar

  $(document).ready(function () {
    $("#default-header").click(function () {
      $("#header-setting").removeClass("color-header bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
    });

    $("#default-sidebar").click(function () {
      $("#sidebar-wrapper").removeClass("bg-theme bg-theme1 bg-theme2 bg-theme3 bg-theme4 bg-theme5 bg-theme6");
    });

  });

});
import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';

const app = new Vue({
	el: '#coupon',
    data:{
      CouponVal:{},
      CouponValidationError:{},
      allCoupon : {},
      editValidationError: {},
      eCouponVal : {},
      eCouponValidationError : {},
    },
    methods:{
    	addCouponmodal()
    	{
    		$('#addcouponmodal').modal('show');

    	},
      addCoupon()
      {
        //alert("hell world");
         let couponAddUrl = $('#urlcouponadd').val();
         console.log(couponAddUrl);
         let _this = this;
         let coupontail = {};
         // coupontail.couponName = $('#coupon-name').val();
         // coupontail.couponDetail = $('#coupon-detail').val();
         // coupontail.couponImage = $('#coupon-image').prop('files')[0];
         let form_data = new FormData();
         form_data.append('couponName', $('#coupon-name').val());
         form_data.append('couponDetail', $('#coupon-detail').val());
         form_data.append('couponImage',$('#coupon-image').prop('files')[0]);
         // let form_data = new FormData();
         console.log(form_data);
       axios.post(couponAddUrl,form_data)
        .then(function(response){
            console.log(response);
          if(response.status == 200 && response.data == 'coupon_created')
          {
              
              $('#addcouponmodal').modal('hide');
             
               _this.getallCoupon();
              swal("Coupon Added Successfully!", "", "success");
          }
        }).
        catch(function(error){
           _this.shopkeeperValidationError = error.response.data.errors;
          console.log(_this.shopkeeperValidationError);
        });
      },
      getallCoupon()
        {
          let _this = this;
          let getAllCouponurl = $('#urlcouponget').val();
          axios.get(getAllCouponurl)
          .then(function(response){
            _this.allCoupon = response.data;
            

          }).
          catch(function(error){

          });
    },
    	 
    	
      

     
      

    },
    mounted(){
      this.getallCoupon();

    },
    beforeDestroy()
    {

    }


});
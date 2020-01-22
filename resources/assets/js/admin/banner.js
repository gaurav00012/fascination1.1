import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';

const app = new Vue({
  el: '#banner',
    data:{
      CouponVal:{},
      CouponValidationError:{},
      allBanner : {},
      editValidationError: {},
      eCouponVal : {},
      eCouponValidationError : {},
    },
    methods:{
      addBannermodal()
      {
        $('#addbannermodal').modal('show');

      },
      addBanner()
      {
        
         let bannerAddUrl = $('#urlBanneradd').val();
         console.log(bannerAddUrl);
         let _this = this;
        
         
         let form_data = new FormData();
        
         form_data.append('bannerImage',$('#baner-image').prop('files')[0]);
         // let form_data = new FormData();
         console.log(form_data);
       axios.post(bannerAddUrl,form_data)
        .then(function(response){
            console.log(response);
          if(response.status == 200 && response.data == 'banner_created')
          {
              
              $('#addbannermodal').modal('hide');
             
               _this.getallBanner();
              swal("Banner Added Successfully!", "", "success");
          }
        }).
        catch(function(error){
           _this.shopkeeperValidationError = error.response.data.errors;
          console.log(_this.shopkeeperValidationError);
        });
      },
      getallBanner()
        {
          let _this = this;
          let getAllBannerurl = $('#urlbannerget').val();
          axios.get(getAllBannerurl)
          .then(function(response){
            _this.allBanner = response.data;
            

          }).
          catch(function(error){

          });
    },
       deleteBanner(id)
      {
        let _this = this;
        let deleteBannerUrl = $('#urlbannerdel').val();
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Coupon!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            axios.get(deleteBannerUrl+'/'+id)
            .then(function(resp){
              let respnc = resp.data;
              if(respnc == 'bannerdeleted')
              {
                //swal("Coupon deleted Successfully!", "", "success");
                  _this.getallBanner();
                  swal("Banner has been deleted!", {
                    icon: "success",
                  });
              }
            }).
            catch(function(resp){
              console.log(resp);
            })

          } else {
            //swal("Your imaginary file is safe!");
          }
        });
      }
      
      

     
      

    },
    mounted(){
      this.getallBanner();

    },
    beforeDestroy()
    {

    }


});
 <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
		
		   <div class="row">
		   
		      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			     <div class="footer_blog">
				    
					 <div class="full white_fonts">
					    <p>Dinas Perindustrian Provinsi Sumatera Selatan</p>
					 </div>
					 <div class="full margin-bottom_30">
					   <img src="<?= base_url('assets/admin');?>/img/perindustrian.png" alt="#" />
					 </div>
				 </div>
			  </div>
			  
			  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			       <div class="footer_blog footer_menu white_fonts">
						    <h3>Akun Media Sosial</h3>
						    <ul> 
							  <li><a href="#">> Facebook</a></li>
							  <li><a href="#">> Instagram</a></li>
							  <li><a href="#">> Twitter</a></li>
							</ul>
						 </div>
				 </div>
				 
				 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				 <div class="footer_blog full white_fonts">
						     <h3>Survei Pengunjung</h3>
							 <p>Input Email Pengunjung</p>
							 <div class="newsletter_form">
							    <form action="<?= base_url('Frontend/tambahpengunjung')  ?>" method="post">
								   <input type="email" placeholder="Masukan Email" required name="email" />
								   <input type="hidden" name="waktu" value="<?= date('Y-m-d') ?>">
								   <button type="submit">Kirim Email</button>
								</form>
							 </div>
						 </div>
					</div>	 
			  
			  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				 <div class="footer_blog full white_fonts">
						     <h3>Kontak</h3>
							 <ul class="full">
							   <li><img src="<?= base_url('assets/frontend/') ?>images/i5.png"><span>Jl. Soekarno<br>Palembang</span></li>
							   <li><img src="<?= base_url('assets/frontend/') ?>images/i6.png"><span>disperinsumsel@gmail.com</span></li>
							   <li><img src="<?= base_url('assets/frontend/') ?>images/i7.png"><span>071-123-2</span></li>
							 </ul>
						 </div>
					</div>	 
			  
		   </div>
		
        </div>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp"><a href="<?= base_url("Admindisperin");?>" target="_blank">©</a> Copyrights <?= date('Y');?> by Dinas Perindustrian Provinsi Sumatera Selatan</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.min.js"></script>
	<script src="<?= base_url('assets/frontend/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.pogo-slider.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/slider-index.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/smoothscroll.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/form-validator.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/contact-form-script.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/isotope.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/images-loded.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/custom.js"></script>

     <!-- sweat alert -->

    <script src="<?= base_url('assets/sweetalert/');?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/sweetalert/');?>js/myscript.js"></script>

    
	<script>
	/* counter js */



(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
	</script>
</body>

</html>
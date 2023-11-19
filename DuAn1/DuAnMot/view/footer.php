<footer>
  <div class="containerfull padd50">
    Copyright Min T shop
    <p>&copy; 2023 Trang Web Của Tôi. Bản quyền thuộc về chúng tôi.</p>
    <p>
      Liên hệ: <a href="mailto:lienhe@example.com">tiencmpc05891.fpt.edu.vn</a> |
      Theo dõi chúng tôi trên:
      <a href="#" class="fa fa-facebook"> Minh Tiến</a>
      <a href="#" class="fa fa-comment"> 0987097962</a>
      <a href="#" class="fa fa-instagram"> Min T</a>

    </p>
  </div>
</footer>








</div>

<!-- js slideshow -->
<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (slides.length === 0) {
      return; // Không có slide nào, thoát khỏi hàm
    }
    
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
</script>


</body>

</html>
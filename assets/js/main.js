// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click', function(e){
      const target = document.querySelector(this.getAttribute('href'));
      if (target){
        e.preventDefault();
        target.scrollIntoView({behavior:'smooth',block:'start'});
      }
    });
  });
  // basic client-side validation could be expanded
  // Course modal handling
  document.querySelectorAll('.view-course').forEach(btn=>{
    btn.addEventListener('click', function(){
      const title = this.dataset.title || 'Course';
      const desc = this.dataset.desc || '';
      const modalTitle = document.querySelector('#courseModalLabel');
      const modalBody = document.querySelector('#courseModalBody');
      if (modalTitle) modalTitle.textContent = title;
      if (modalBody) modalBody.textContent = desc;
      const modalEl = document.getElementById('courseModal');
      if (modalEl) {
        const bsModal = new bootstrap.Modal(modalEl);
        bsModal.show();
      }
    });
  });
});

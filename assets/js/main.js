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
  function openDetailModal(title, desc, outcomes) {
    const modalTitle = document.querySelector('#courseModalLabel');
    const modalBody = document.querySelector('#courseModalBody');
    if (modalTitle) modalTitle.textContent = title;
    if (modalBody) {
      let html = '';
      if (desc) html += '<p>' + desc + '</p>';
      modalBody.innerHTML = html;
    }
    const modalEl = document.getElementById('courseModal');
    if (modalEl) {
      const bsModal = new bootstrap.Modal(modalEl);
      bsModal.show();
    }
  }

  document.querySelectorAll('.view-course, .view-faculty').forEach(btn=>{
    btn.addEventListener('click', function(){
      const title = this.dataset.title || 'Details';
      const desc = this.dataset.desc || '';
      const outcomes = this.dataset.outcomes || '';
      openDetailModal(title, desc, outcomes);
    });
  });
    // Graceful fallback: attach to dynamically created faculty items as well
    document.body.addEventListener('click', function(e){
      var el = e.target.closest && e.target.closest('.view-course, .view-faculty');
      if(el){
        var title = el.getAttribute('data-title');
        var desc = el.getAttribute('data-desc');
        var outcomes = el.getAttribute('data-outcomes') || '';
        openDetailModal(title, desc, outcomes);
      }
    });
});

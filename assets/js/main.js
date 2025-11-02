/**
 * Main JavaScript file for AvSec theme
 */

(function() {
    'use strict';

    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            // const isExpanded = this.getAttribute('aria-expanded') === 'true';
            // this.setAttribute('aria-expanded', !isExpanded);
            
            // Obsługa mega menu
            setTimeout(function() {
                const menuButton = document.querySelector('.mega-menu-toggle');
                const menu = document.querySelector('.mega-menu');
          
                if (menuButton && menu) {
                    if (menu.classList.contains('mega-menu-open')) {
                        menuButton.click(); // Zamknij menu
                    } else {
                        menuButton.click(); // Otwórz menu
                    }
                }
            }, 100);
        });
    }
      

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Search modal functionality
    const searchTrigger = document.getElementById('search-trigger');
    const searchModal = document.getElementById('search-modal');
    const searchClose = document.getElementById('search-close');
    const searchInput = document.querySelector('.search-input');

    if (searchTrigger && searchModal) {
        // Open modal
        searchTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            searchModal.classList.add('active');
            document.body.classList.add('modal-open');
            // Focus on search input after animation
            setTimeout(() => {
                if (searchInput) {
                    searchInput.focus();
                }
            }, 300);
        });

        // Close modal
        function closeModal() {
            searchModal.classList.remove('active');
            document.body.classList.remove('modal-open');
        }

        if (searchClose) {
            searchClose.addEventListener('click', closeModal);
        }

        // Close modal when clicking outside
        searchModal.addEventListener('click', function(e) {
            if (e.target === searchModal) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchModal.classList.contains('active')) {
                closeModal();
            }
        });
    }

    // Add loading class to body
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('loaded');
    });
    // Calaps functionality
    const calaps = document.querySelectorAll(".calaps");
    for (let i = 0; i < calaps.length; i++) {
      calaps[i].querySelector(".calaps__opener").addEventListener("click", function () {
        calaps[i].classList.toggle("active");
      });
    }

})();

(function() {
    'use strict';
    const siteNav = document.querySelector('#site-navigation');
    let siteNavHeight = 0; // Declare outside so it's accessible to both functions
    
    if (siteNav) {
        // Get the height of site navigation
        siteNavHeight = siteNav.offsetHeight;
        // Store original position
        const originalTop = siteNav.offsetTop;
        
        // Add fixed class when element reaches top of viewport
        function handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop >= originalTop) {
                siteNav.classList.add('fixed');
                // Force recalculation of siteNav height in case it changed (e.g., on resize)
                const navHeight = siteNav.offsetHeight;
                document.querySelector('#page').style.paddingTop = navHeight + 'px';
            } else {
                siteNav.classList.remove('fixed');
                document.querySelector('#page').style.paddingTop = '0px';
            }
        }
        
        // Listen for scroll events
        window.addEventListener('scroll', handleScroll);
        
        // Check initial position
        handleScroll();
    }

   
})();

// Sticky header-content-right for mobile devices
(function() {
    'use strict';
    const headerContentRight = document.querySelector('.header-content-right');
    
    if (headerContentRight) {
        // Store original position
        const originalTop = headerContentRight.offsetTop;
        
        // Add sticky class when element reaches top of viewport
        function handleHeaderRightScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Only apply sticky behavior on screens smaller than 768px
            if (window.innerWidth < 768) {
                if (scrollTop >= originalTop) {
                    headerContentRight.classList.add('sticky');
                    // Add padding to body to prevent content jump
                    document.body.style.paddingTop = headerContentRight.offsetHeight + 'px';
                } else {
                    headerContentRight.classList.remove('sticky');
                    document.body.style.paddingTop = '0px';
                }
            } else {
                // Remove sticky class and padding on larger screens
                headerContentRight.classList.remove('sticky');
                document.body.style.paddingTop = '0px';
            }
        }
        
        // Listen for scroll events
        window.addEventListener('scroll', handleHeaderRightScroll);
        
        // Listen for resize events to handle responsive behavior
        window.addEventListener('resize', handleHeaderRightScroll);
        
        // Check initial position
        handleHeaderRightScroll();
    }
})();


(function(){
  const el = document.querySelector('#go-to-top');
  const social = document.querySelector('.sticky-socialmedia');
  window.addEventListener('scroll', function() {
    if (window.scrollY > 100) {
      el.classList.add('active');
     
    } else {
      el.classList.remove('active');

    }
    if (window.scrollY > 200) {
   
        social.classList.add('active');
      } else {
     
        social.classList.remove('active');
      }
  });
  el.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
})();


if (jQuery(window).width() > 500) {
    jQuery('.go-parallex').paroller({
        factor: 0.3, // multiplier for scrolling speed and offset, +- values for direction control  
        // factorLg: 0.4, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
        type: 'foreground', // background, foreground  
        direction: 'vertical', // vertical, horizontal  
        transition: 'translate 0.1s ease' // CSS transition, added on elements where type:'foreground' 
    });
    jQuery('.go-parallex-kids').paroller({
        factor: -0.2, // multiplier for scrolling speed and offset, +- values for direction control  
        // factorLg: 0.4, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
        type: 'foreground', // background, foreground  
        direction: 'vertical', // vertical, horizontal  
        transition: 'translate 0.1s ease' // CSS transition, added on elements where type:'foreground' 
    });
  }
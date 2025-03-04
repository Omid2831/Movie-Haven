function toggleMode() {
    const currentMode = document.body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode';
    
    document.body.classList.add('fade-out');
    
    setTimeout(() => {
      if (currentMode === 'dark-mode') {
        document.body.classList.remove('dark-mode');
        document.body.classList.add('light-mode');
      } else {
        document.body.classList.remove('light-mode');
        document.body.classList.add('dark-mode');
      }
      document.body.classList.remove('fade-out');
    }, 200);
  }
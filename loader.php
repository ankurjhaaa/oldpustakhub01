<!-- ✅ loader.php -->
<div id="loader" style="display: none;">
  <div class="spinner-wrapper">
    <div class="spinner"></div>
  </div>
</div>

<style>
  #loader {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: rgba(255, 255, 255, 0.4);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .spinner-wrapper {
    padding: 10px;
    background: rgba(255,255,255,0.85);
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
  }

  .spinner {
    border: 4px solid #ddd;
    border-top: 4px solid #e63946;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    animation: spin 0.9s linear infinite;
  }

  @keyframes spin {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>

<script>
  function showLoaderThenSubmit(form) {
    document.getElementById("loader").style.display = "flex";
    setTimeout(() => {
      form.submit();
    }, 800); // 800ms delay
  }
</script>

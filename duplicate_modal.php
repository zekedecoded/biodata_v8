<?php
// ============================================================
// [ADDED] duplicate_modal.php
// USAGE: Include this file inside the <body> of any form page.
//        Requires session_start() to be called before this include.
//
// HOW TO ADD TO YOUR PAGES:
//   1. Very top of addPerson.php / editPerson.php / index.php:
//        session_start();
//   2. After your <body> tag:
//        include 'duplicate_modal.php';
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// [ADDED] Prepare variables — set to null/false if no duplicate in session
$_dup_show = isset($_SESSION["duplicate_error"], $_GET["duplicate"]);
$_dup_data = $_dup_show ? $_SESSION["duplicate_error"] : null;

if ($_dup_show) {
    $match = $_dup_data["match"];
    $conflictName = htmlspecialchars(strtoupper($match["firstname"] . " " . $match["lastname"]));
    $conflictEmail = htmlspecialchars($match["email"]);
    $conflictMobile = htmlspecialchars($match["mobile"]);
    $conflictID = htmlspecialchars($match["personID"]);
    $dupField = htmlspecialchars($_dup_data["field"]);
    $dupSource = htmlspecialchars($_dup_data["source"]);
    $dupIsAdmin = isset($_dup_data["context"]) && $_dup_data["context"] === "accept";
    $dupEmailConflict = str_contains($_dup_data["field"], "email");
    $dupMobConflict = str_contains($_dup_data["field"], "mobile");

    // [ADDED] Clear session now so refresh doesn't re-trigger the modal
    unset($_SESSION["duplicate_error"]);
}
?>
<?php if ($_dup_show): ?>
<!-- ======================================================= -->
<!-- [ADDED] Duplicate Record Error Modal — duplicate_modal.php -->
<!-- ======================================================= -->
<style>
  #duplicateModal {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 999999;
    background: rgba(0,0,0,0.55);
    backdrop-filter: blur(3px);
    align-items: center;
    justify-content: center;
    animation: dupFadeIn 0.2s ease;
    margin: 0;
    padding: 0;
    transform: none !important;
  }
  @keyframes dupFadeIn { from { opacity:0; } to { opacity:1; } }

  #duplicateModal .dup-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 24px 60px rgba(0,0,0,0.28);
    max-width: 500px;
    width: calc(100vw - 48px);
    overflow: hidden;
    animation: dupSlideUp 0.25s cubic-bezier(0.34,1.56,0.64,1);
    position: relative;
    box-sizing: border-box;
  }
  @keyframes dupSlideUp {
    from { transform: translateY(30px) scale(0.97); opacity:0; }
    to   { transform: translateY(0)    scale(1);    opacity:1; }
  }

  #duplicateModal .dup-header {
    background: linear-gradient(135deg, #c0392b, #e74c3c);
    padding: 22px 28px 18px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-sizing: border-box;
  }
  #duplicateModal .dup-icon {
    flex-shrink: 0;
    width: 38px; height: 38px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem; color: #fff;
  }
  #duplicateModal .dup-header h4 {
    color: #fff;
    margin: 0 0 2px;
    font-size: 1.1rem;
    font-weight: 700;
  }
  #duplicateModal .dup-header p {
    color: rgba(255,255,255,0.82);
    margin: 0;
    font-size: 0.82rem;
  }
  #duplicateModal .dup-body {
    padding: 22px 28px 8px;
    box-sizing: border-box;
  }
  #duplicateModal .dup-message {
    background: #fff5f5;
    border-left: 4px solid #e74c3c;
    border-radius: 6px;
    padding: 12px 16px;
    font-size: 0.9rem;
    color: #333;
    margin-bottom: 16px;
    line-height: 1.6;
  }
  #duplicateModal .dup-message strong { color: #c0392b; }
  #duplicateModal .dup-badge {
    display: inline-block;
    background: #fff3cd;
    color: #7d5a00;
    border: 1px solid #ffc107;
    border-radius: 20px;
    padding: 3px 12px;
    font-size: 0.76rem;
    font-weight: 600;
    margin-bottom: 16px;
  }
  #duplicateModal .dup-record {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
  }
  #duplicateModal .dup-record-title {
    background: #f5f5f5;
    border-bottom: 1px solid #e0e0e0;
    padding: 8px 16px;
    font-size: 0.72rem;
    font-weight: 700;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 0.08em;
  }
  #duplicateModal .dup-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    border-bottom: 1px solid #f0f0f0;
    font-size: 0.88rem;
    box-sizing: border-box;
  }
  #duplicateModal .dup-row:last-child { border-bottom: none; }
  #duplicateModal .dup-row .lbl {
    color: #999;
    min-width: 80px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    flex-shrink: 0;
  }
  #duplicateModal .dup-row .val {
    color: #222;
    font-weight: 500;
    word-break: break-all;
  }
  #duplicateModal .dup-row.conflict { background: #fff5f5; }
  #duplicateModal .dup-row.conflict .lbl { color: #c0392b; }
  #duplicateModal .dup-row.conflict .lbl::after { content: ' \26A0'; }
  #duplicateModal .dup-row.conflict .val { color: #c0392b; font-weight: 700; }
  #duplicateModal .dup-footer {
    padding: 12px 28px 24px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    box-sizing: border-box;
  }
  #duplicateModal .dup-btn {
    padding: 9px 22px;
    border-radius: 8px;
    font-size: 0.88rem;
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: all 0.15s;
    white-space: nowrap;
    flex-shrink: 0;
  }
  #duplicateModal .btn-back  { background: #f0f0f0; color: #444; }
  #duplicateModal .btn-back:hover  { background: #e0e0e0; }
  #duplicateModal .btn-close { background: #e74c3c; color: #fff; }
  #duplicateModal .btn-close:hover { background: #c0392b; transform: translateY(-1px); }
</style>

<div id="duplicateModal">
  <div class="dup-card">

    <div class="dup-header">
      <div class="dup-icon">&#9888;</div>
      <div>
        <h4>Duplicate Record Detected</h4>
        <p><?php echo $dupIsAdmin
            ? "This submission cannot be approved."
            : "Your submission could not be completed."; ?></p>
      </div>
    </div>

    <div class="dup-body">

      <div class="dup-message">
        <?php if ($dupIsAdmin): ?>
          This pending submission was <strong>blocked</strong> because the
          <strong><?php echo $dupField; ?></strong> already belongs to an existing record
          in <strong><?php echo $dupSource; ?></strong>. The pending entry has been removed.
        <?php else: ?>
          A record with the same <strong><?php echo $dupField; ?></strong> already exists
          in our system under <strong><?php echo $dupSource; ?></strong>.
          Please use a different <?php echo $dupField; ?>, or contact the administrator if you believe this is an error.
        <?php endif; ?>
      </div>

      <div>
        <span class="dup-badge">Found in: <?php echo ucfirst($dupSource); ?></span>
      </div>

      <div class="dup-record">
        <div class="dup-record-title">Existing Record &nbsp;&middot;&nbsp; ID #<?php echo $conflictID; ?></div>

        <div class="dup-row">
          <span class="lbl">Name</span>
          <span class="val"><?php echo $conflictName; ?></span>
        </div>

        <div class="dup-row <?php echo $dupEmailConflict ? "conflict" : ""; ?>">
          <span class="lbl">Email</span>
          <span class="val"><?php echo $conflictEmail; ?></span>
        </div>

        <div class="dup-row <?php echo $dupMobConflict ? "conflict" : ""; ?>">
          <span class="lbl">Mobile</span>
          <span class="val"><?php echo $conflictMobile; ?></span>
        </div>
      </div>

    </div>

    <div class="dup-footer">
      <button class="dup-btn btn-back"  onclick="window.history.back()">&#8592; Go Back</button>
      <button class="dup-btn btn-close" onclick="document.getElementById('duplicateModal').style.display='none'">Dismiss</button>
    </div>

  </div>
</div>

<script>
  // Move the modal to <body> directly so no parent CSS can clip or offset it
  (function() {
    var modal = document.getElementById('duplicateModal');
    if (modal && modal.parentNode !== document.body) {
      document.body.appendChild(modal);
    }
  })();
</script>

<?php endif; ?>

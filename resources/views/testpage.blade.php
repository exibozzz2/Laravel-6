@extends("layout")

@section("pageTitle")
    Test Page
@endsection

@section("content")

    <div class="container mt-5">
        <button class="btn btn-primary" id="openSidebar">Open Sidebar</button>
    </div>

    <!-- Main Sidebar -->
    <div class="glass-sidebar" id="sidebar">
        <div class="sidebar-item">New Tab</div>
        <div class="sidebar-item">New Window</div>
        <div class="sidebar-item">New Private Window</div>
        <div class="sidebar-item">New Private Window with Tor</div>

        <div class="separator"></div>

        <div class="sidebar-item">Leo</div>
        <div class="sidebar-item">Wallet</div>
        <div class="sidebar-item">Brave VPN</div>

        <div class="separator"></div>

        <div class="switch-toggle">
            <span>Side bar</span>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="sidebarToggle">
            </div>
        </div>

        <div class="separator"></div>

        <div class="sidebar-item expandable" data-target="passwordPanel">
            <span>*Password and autofill</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
        <div class="sidebar-item expandable" data-target="historyPanel">
            <span>*History</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
        <div class="sidebar-item expandable" data-target="bookmarksPanel">
            <span>*Bookmarks and lists</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
        <div class="sidebar-item expandable" data-target="downloadsPanel">
            <span>*Downloads</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
        <div class="sidebar-item expandable" data-target="extensionsPanel">
            <span>*Extensions</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
        <div class="sidebar-item expandable" data-target="deletePanel">
            <span>*Delete browsing data</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
        <div class="sidebar-item expandable" data-target="settingsPanel">
            <span>*Settings</span>
            <i class="bi bi-chevron-right arrow"></i>
        </div>
    </div>

    <!-- Sub Panels -->
    <div class="sub-panel" id="passwordPanel">Password & Autofill Settings</div>
    <div class="sub-panel" id="historyPanel">Browsing History Details</div>
    <div class="sub-panel" id="bookmarksPanel">Bookmarks & Lists Section</div>
    <div class="sub-panel" id="downloadsPanel">Downloads Info</div>
    <div class="sub-panel" id="extensionsPanel">Extensions Settings</div>
    <div class="sub-panel" id="deletePanel">Clear Browsing Data</div>
    <div class="sub-panel" id="settingsPanel">General Settings</div>

    <script>
        document.getElementById('openSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.add('show');
        });

        document.querySelectorAll('.expandable').forEach(item => {
            item.addEventListener('click', () => {
                const targetId = item.getAttribute('data-target');
                const panel = document.getElementById(targetId);

                // Close all other panels
                document.querySelectorAll('.sub-panel').forEach(p => {
                    if (p !== panel) p.classList.remove('show');
                });

                // Toggle this panel
                panel.classList.toggle('show');

                // Rotate arrow
                const arrow = item.querySelector('.arrow');
                document.querySelectorAll('.arrow').forEach(a => {
                    if (a !== arrow) a.classList.remove('rotate');
                });
                arrow.classList.toggle('rotate');
            });
        });
    </script>
@endsection

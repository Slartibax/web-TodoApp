<div class="membersBlock membersShader"> <!-- Members Block -->
    <div class="memberFoldButton">
        <input class=" memberFoldButton round icon iconHamburgerMenu" type="button" id="membersFold">
    </div>
    <div class="members" > <!-- Members List -->
        <div class="membersTitleBlock center-content">
                Members
        </div>
        @each('partials.member',$members,'member')
    </div>
</div>

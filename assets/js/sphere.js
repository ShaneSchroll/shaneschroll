window.onload = function() {
    try {
        TagCanvas.Start('sphere-canvas', 'sphere-tags', {
            reverse: false,
            depth: 0.75,
            maxSpeed: 0.06,
            wheelZoom: false,
            freezeActive: false,
            dragControl: true,
            shuffleTags: true,
            shape: 'sphere',
            clickToFront: 450,
            outlineMethod: 'none',
            initial: [0.03, -0.03]
        });
    } catch(e) {
        document.getElementById('sphere-container').style.display = 'none';
    }
};
window.onload = function() {
    try {
        TagCanvas.Start('sphere-canvas', 'sphere-tags', {
            reverse: false,
            depth: 0.4,
            maxSpeed: 0.06,
            wheelZoom: true,
            freezeActive: false,
            shuffleTags: true,
            shape: 'sphere',
            clickToFront: 450,
            outlineMethod: 'none',
            initial: [0.03, -0.03],
            dragControl: true
        });
    } catch(e) {
        document.getElementById('sphere-container').style.display = 'none';
    }
};
var items = $("#e, #dl, #dd"),
    e = $("#e"),
    dd = $("#dd"),
    dl = $("#dl"),
        tl = new TimelineMax();

TweenLite.set("svg", {visibility:"visible"})

tl.from(e, 1, {drawSVG:0})
.from(dl, 0.5, {drawSVG:"50% 50%"}, "-=0.5")
.from(dd, 0.5, {drawSVG:0}, "-=0.5")


    .from(items, 0.2, {fill:"none"}, "end")
    .to(items, 0.2, {strokeWidth:0}, "end")

//super slow-mo
tl.timeScale(0.2)

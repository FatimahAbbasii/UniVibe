/* Custom CSS for the main background gradient */
.bg-gradient-univibe {
    background: linear-gradient(to bottom, #5B008E, #3D0063); /* Deeper purples to match the image */
}

/* Custom dark background for the icon row and upcoming events card */
.bg-dark-card {
    background-color: #1F0038; /* A very dark, almost black-purple */
}

/* Custom CSS for the event image filter effect */
.event-image-filter {
    position: relative;
    overflow: hidden; /* Ensure pseudo-element stays within bounds */
}

.event-image-filter img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%) brightness(75%) contrast(150%); /* Adjust to match the purple hue */
}

.event-image-filter::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(91, 0, 142, 0.4); /* Purple overlay with opacity */
    mix-blend-mode: multiply; /* Blends with the image, creating a tinted effect */
}

/* Adjusting for proper display of icons (heroicons vs image) */
.icon-bg-purple {
    background-color: #8B5CF6; /* Tailwind purple-500 */
}
.icon-bg-yellow {
    background-color: #FBBF24; /* Tailwind yellow-400 */
}

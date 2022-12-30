// Handlers and function for 'Grab and scroll'
const grabAndScrollListener = (event, element) => {
    let positions = {
        top: 0, left: 0, x: 0, y: 0
    };

    positions = {
        top: element.scrollTop,
        left: element.scrollLeft, x: event.clientX, y: event.clientY
    };

    element.style.cursor = 'grabbing';
    element.style.userSelect = 'none';

    element.addEventListener('mousemove', element.mouseMoveHandler = event => {
        const dx = event.clientX - positions.x;
        const dy = event.clientY - positions.y;

        element.scrollTop = positions.top - dy;
        element.scrollLeft = positions.left - dx;
    });

    element.addEventListener('mouseup', element.mouseUpHandler = () => {
        element.removeEventListener('mousemove', element.mouseMoveHandler);
        element.removeEventListener('mouseup', element.mouseUpHandler);

        element.style.cursor = 'grab';
        element.style.removeProperty('user-select');
    });
}

export {grabAndScrollListener};
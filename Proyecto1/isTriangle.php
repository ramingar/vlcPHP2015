<?php

require ('createVector.php');

/**
 * Check if three points make up a triangle
 * 
 * @param array $point1
 * @param array $point2
 * @param array $point3
 * @return boolean
 */
function isTriangle($point1, $point2, $point3)
{
    /*
     * Steps:
     * First  -> point1 and point2 are the same point? (If TRUE -> stop)
     * Second -> point1 and point3 are the same point? (If TRUE -> stop)
     * Third  -> vector12 from point1 to point2 and vector13 from point1 to
     *           point3 have slope? (If neither have, then stop)
     * Fourth -> vector12's slope is different from vector13's slope?
     *           (if they are different, then we have a triangle)
     */
    $result = FALSE;
    $vector12 = createVector($point1, $point2);
    $vector13 = createVector($point1, $point3);

    if (!($vector12[0]==0 && $vector12[1]==0) && !($vector13[0]==0 && $vector13[1]==0)) {
        if (!($vector12[0]==0 && $vector13[0]==0) && ($vector12[1]/$vector12[0]!=$vector13[1]/$vector13[0])) {
            $result = TRUE;
        }
    }
    return $result;
}
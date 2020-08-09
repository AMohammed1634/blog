
import cv2 as cv
from random import random


def responeMessage(code, status, mgs):
    return {
        "status": status,
        "response_code": code,
        "message": mgs
    }


def addText(req):
    fonts = (
        cv.FONT_HERSHEY_COMPLEX,
        cv.FONT_HERSHEY_COMPLEX_SMALL,
        cv.FONT_HERSHEY_DUPLEX,
        cv.FONT_HERSHEY_PLAIN,
        cv.FONT_HERSHEY_SCRIPT_COMPLEX,
        cv.FONT_HERSHEY_SCRIPT_SIMPLEX,
        cv.FONT_HERSHEY_SIMPLEX,
        cv.FONT_HERSHEY_TRIPLEX,
        cv.FONT_ITALIC
    )

    print(req)
    if "img" not in req.keys() or "text" not in req.keys():
        return responeMessage(6, 'Faild', "Failed No data Send")
    imgObj = req['img']
    if "img_src" not in imgObj.keys() or "width" not in imgObj.keys() \
        or "height" not in imgObj.keys() \
        or "x" not in imgObj.keys() or "y" not in imgObj.keys() \
        or "font_size" not in imgObj.keys() or "font_family" not in imgObj.keys() \
        or "font_color" not in imgObj.keys():
        return responeMessage(7, "Failed", "Failed Parameters Is Not Complete")
    txt = req["text"]
    img = cv.imread(imgObj['img_src'])
    # show image
    width = int(imgObj['width'])
    height = int(imgObj['height'])
    newSize = (width, height)
    img = cv.resize(img, newSize)
    x = int(imgObj['x'])
    y = int(imgObj['y'])
    font_size = int(imgObj['font_size'])
    fontIndex = int(imgObj["font_family"])
    if fontIndex >= len(fonts):
        return responeMessage(8, "Failed", "Failed index of Font Family in not successfully ")
    # add text
    position = (x, y)
    color = imgObj["font_color"]

    if len(color) > 3:
        return responeMessage(9, "Failed", "Failed color  in not successfully ")

    print(color)
    cv.putText(
        img,
        txt,
        position,
        fonts[fontIndex],  # font family
        font_size,  # font size
        color,  # font color
        1  # font stroke
    )
    cv.imshow("AddText", img)
    cv.waitKey(0)
    cv.destroyAllWindows()
    # create Image
    name = "NewTextAdded" + str(random()) + ".jpg"
    cv.imwrite(name, img)
    return dict(response_code=5, status="Success", Message="Text Added Successfully", name=name)

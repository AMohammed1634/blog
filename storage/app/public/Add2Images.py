# -*- coding: utf-8 -*-
"""
Created on Mon Dec  9 14:18:18 2019

@author: AhmedM
"""
import flask
import numpy
from flask import request, jsonify
import cv2 as cv
from random import random

app = flask.Flask(__name__)
app.config["DEBUG"] = True

def responeMessage(code,status,mgs):
    return {
        "status": status,
        "response_code": code,
        "message":mgs
    }

@app.route("/api/test/",methods=["GET"])
def func():
    return {
        "key":"value"
    }


@app.route('/api/', methods=['POST'])
def api_all():

    # get the JSON OBJECT
    req = request.get_json()
    if len(req) == 0 :
        return responeMessage(2,"faild","Error In Parameters Messing")
    print(req)
    if "l_img" not in req.keys() or "s_img" not in req.keys():
        return responeMessage(3,"failed","ERROR missing Arguments ")

    # Extract an large image Object
    l_imgObj = req["l_img"]
    # read Image
    l_img = cv.imread(l_imgObj["img_src"])
    if l_img is None:
        return responeMessage(4,"failed","Failed to load An Image From Source")
    print(req.keys())

    # if l_img.all()==None :
    #     return responeMessage(3,"failed","Faild to Load Image")
    # Resize this imag
    l_img_width = int(l_imgObj['width'])
    l_img_height = int(l_imgObj['height'])
    dsize = (l_img_width,l_img_height)
    l_img = cv.resize(l_img, dsize)
    print(l_img.shape)
    # cv.imshow('composited image', l_img)

    s_img_obj = req["s_img"]
    countOfSmailImg = len(s_img_obj)
    for smailImagObject in s_img_obj:
        smailImg = cv.imread(smailImagObject["img_src"])
        if smailImg is None:
            return responeMessage(4, "failed", "Failed to load An Image From Source")
        width = int(smailImagObject["width"])
        height = int(smailImagObject["height"])
        offset_x = smailImagObject["x"]
        offset_y = smailImagObject["y"]
        newSize = (width, height)
        smailImg = cv.resize(smailImg,newSize)
        # add Images وهخبطها افايه بت حرام كافره
        # h = smailImg.shape[0]
        # w = smailImg.shape[1]
        # return str(offset_y+smailImg.shape[0])+"  --  "+str(l_img.shape[0])
        newWidth, newHeight = smailImg.shape[0], smailImg.shape[1]
        flag = 0
        if offset_y + smailImg.shape[0] > l_img.shape[0]:
            newWidth = l_img.shape[0] - offset_y
            # return "out side of width"
        if offset_x + smailImg.shape[1] > l_img.shape[1]:
            newHeight = l_img.shape[1] - offset_x
            # return "out side of height"
        print("newWidth "+str(newWidth))
        print("newheight " + str(newHeight))
        l_img[offset_y:offset_y + newWidth, offset_x:offset_x + newHeight] = smailImg[0:newWidth, 0:newHeight]

    cv.imshow('New Image', l_img)
    cv.waitKey(0)
    #error
    cv.destroyAllWindows()
    name = "NewCustomization"+str(random())+".jpg"
    cv.imwrite("newImages/"+name, l_img)
    print(name)
    return {
        "name":name,
        "status":"Success",
        "response_code":1
    }



app.run()
# app.run(host = '0.0.0.0')

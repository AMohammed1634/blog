from addImages import addImages
from addText import addText


def save(requestJSON):
    add_images = dict(l_img=requestJSON["container"], s_img=requestJSON["images"])
    result = addImages(add_images)
    if result['response_code'] != 1:
        return result
    print(result['name'])
    if int(requestJSON['flage']) != 1:
        return dict(response_code=10, status="Success", name=result['name'], message='Item Save Success')
    add_txt = dict(text=requestJSON['word']['text'],
                   img=dict(img_src=str(result['name']),
                            width=requestJSON['container']['width'],
                            height=requestJSON['container']['height'],
                            x=requestJSON['word']['x'],
                            y=requestJSON['word']['y'],
                            font_size=requestJSON['word']['font_size'],
                            font_family=requestJSON['word']['font_family'],
                            font_color=requestJSON['word']['font_color']
                            )
                   )
    r = addText(add_txt)
    if r['response_code'] != 5:
        return r
    return dict(response_code=10, status="Success", name=r['name'], message='Item Save Success')

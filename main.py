from distutils.log import debug
import io
from unittest import result
import cv2
from pickletools import read_uint1
from torchvision import models
import json
from flask import Flask, jsonify, request, render_template
from flask import make_response
import torchvision.transforms as transforms
import torch
from PIL import Image
import os

#app= Flask(__name__)

path = 'C:/Users/user-pc/Desktop/visual/yolo/result'

# yolo model 불러오기
model = torch.hub.load('.', 'custom', path='./best.pt', source='local')

img = 'C:/Users/user-pc/Desktop/visual/yolo/test1.jpg'
video = 'C:/Users/user-pc/Desktop/visual/yolo/road.mp4'

cap = cv2.VideoCapture(video)
print(cap)
cv2.imshow("show", cap)
# result = model(cap)  # 이미지가 나옴. 이걸 이제 경로를 지정해줘서 저장 해야함.

# print(result)

# result.save(save_dir='runs/output')


""" def save_image(file):
    file.save('./temp/'+file.filename)

@app.route('/')
def web():
    return "helo world"



@app.route('/upload-image', methods=['POST'])
def detect():
    if request.method == 'POST':
        file = request.files['file']
        save_image(file)
        test_img =  './temp/'+file.filename
        result = model(test_img)

        ouput_image_path = model(test_img)

    return render_template("upload_image.html")

@app.route('/show_image')
def display():
    


if __name__ == "__main__":
    app.run(debug=True) """

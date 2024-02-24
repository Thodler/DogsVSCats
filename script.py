import tensorflow as tf
from preprocessing import process_image
import skimage as ski
import numpy as np

model = tf.keras.models.load_model('model.keras')

image = process_image(ski.io.imread('image_check/img.jpg'))

predict = model.predict(np.asarray([image]))

print(predict)


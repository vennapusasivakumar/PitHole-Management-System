import cv2
import os

def detect_and_measure_potholes(image_path, pixels_per_cm, destination_dir):
    # Reading test image
    img = cv2.imread(image_path)

    # Reading label names from obj.names file
    with open(os.path.join("project_files", 'obj.names'), 'r') as f:
        classes = f.read().splitlines()

    # Importing model weights and config file
    net = cv2.dnn.readNet('project_files/yolov4_tiny.weights', 'project_files/yolov4_tiny.cfg')
    model = cv2.dnn_DetectionModel(net)
    model.setInputParams(scale=1 / 255, size=(416, 416), swapRB=True)
    classIds, scores, boxes = model.detect(img, confThreshold=0.6, nmsThreshold=0.4)

    # Detection
    for (classId, score, box) in zip(classIds, scores, boxes):
        # Draw rectangle on image
        cv2.rectangle(img, (box[0], box[1]), (box[0] + box[2], box[1] + box[3]),
                      color=(0, 255, 0), thickness=2)

        # Calculate width and height of the bounding box in centimeters
        width_pixels = box[2]
        height_pixels = box[3]

        # Convert width and height from pixels to centimeters
        width_cm = width_pixels / pixels_per_cm
        height_cm = height_pixels / pixels_per_cm

        # Display width and height on image
        # Position text for width above the bounding box
        cv2.putText(img, f"Width: {width_cm:.2f} cm", (box[0], box[1] - 20),
                    cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)

        # Position text for height to the right of the bounding box
        cv2.putText(img, f"Height: {height_cm:.2f} cm", (box[0] + box[2] + 10, box[1] + 15),
                    cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)

    # Save the result image to the destination directory
    result_image_path = os.path.join(destination_dir, "result_" + os.path.basename(image_path))
    cv2.imwrite(result_image_path, img)

    print(f"Result image saved to: {result_image_path}")

# Folder containing images
image_folder = 'source/'

# Destination directory for result images
destination_dir = 'destination/'

# Pixel per cm conversion factor (replace this with your actual value)
pixels_per_cm = 10  # For example

# Create the destination directory if it doesn't exist
os.makedirs(destination_dir, exist_ok=True)

# Process each image in the folder
for filename in os.listdir(image_folder):
    if filename.endswith(('.jpg', '.jpeg', '.png')):
        image_path = os.path.join(image_folder, filename)
        print("Processing", image_path)
        detect_and_measure_potholes(image_path, pixels_per_cm, destination_dir)

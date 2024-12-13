<?php

require_once("./Core/Database.php");

class ActivityLog extends Database {
    // Log activity
    public function logActivity($userId, $actionType, $tableName = null, $recordId = null, $searchKeywords = null) {
        try {
            $dbh = $this->connect();
            $sql = "INSERT INTO activity_logs (user_id, action_type, table_name, record_id, search_keywords) 
                    VALUES (:user_id, :action_type, :table_name, :record_id, :search_keywords)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ':user_id' => $userId,
                ':action_type' => $actionType,
                ':table_name' => $tableName,
                ':record_id' => $recordId,
                ':search_keywords' => $searchKeywords,
            ]);
        } catch (PDOException $e) {
            echo "Error logging activity: " . $e->getMessage();
        }
    }
    

    public function getAllLogs($userId = null) {
        try {
            $dbh = $this->connect();
            if ($userId) {
                $sql = "SELECT * FROM activity_logs WHERE user_id = :user_id ORDER BY action_timestamp DESC";
                $stmt = $dbh->prepare($sql);
                $stmt->execute([':user_id' => $userId]);
            } else {
                $sql = "SELECT * FROM activity_logs ORDER BY action_timestamp DESC";
                $stmt = $dbh->query($sql);
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching logs: " . $e->getMessage();
            return [];
        }
    }
    
    public function getUserEmail($userId) {
        try {
            $dbh = $this->connect();
            $sql = "SELECT email FROM users WHERE id = :user_id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([':user_id' => $userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['email'] ?? 'Unknown';
        } catch (PDOException $e) {
            return 'Error fetching email: ' . $e->getMessage();
        }
    }
    
}

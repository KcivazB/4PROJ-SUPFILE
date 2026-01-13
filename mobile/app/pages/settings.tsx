import { View, Text, StyleSheet, TouchableOpacity } from 'react-native';
import { useRouter } from 'expo-router';
import TopBar from '../top-bar';
import { Colors } from '@/constants/Colors';
import { Ionicons } from '@expo/vector-icons';

export default function Settings() {
  const router = useRouter();

  return (
    <View style={styles.container}>
      <TopBar />
      <View style={styles.content}>
        <Text style={styles.title}>Paramètres</Text>
        
        <TouchableOpacity 
          style={styles.backButton}
          onPress={() => router.back()}
        >
          <Ionicons name="arrow-back" size={24} color={Colors.light.color_1} />
          <Text style={styles.backButtonText}>Retour</Text>
        </TouchableOpacity>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  content: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#362E7D',
    marginBottom: 40,
  },
  backButton: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: Colors.light.color_8,
    paddingVertical: 12,
    paddingHorizontal: 24,
    borderRadius: 10,
    gap: 8,
  },
  backButtonText: {
    color: Colors.light.color_1,
    fontSize: 16,
    fontWeight: '600',
  },
});
